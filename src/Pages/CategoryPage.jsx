import { useEffect, useState } from 'react';
import { useParams, Link } from 'react-router-dom';
import Layout from '../components/Layout_temp';
import RecipeItem from '../components/RecipeItem';
import { motion } from 'framer-motion';

const CategoryPage = () => {
  const { id } = useParams();
  const [recipes, setRecipes] = useState([]);
  const [categoryName, setCategoryName] = useState('');
  const [categoryDescription, setCategoryDescription] = useState('');
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);

  useEffect(() => {
    setTimeout(() => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }, 100);
  }, []);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const makananRes = await fetch('http://127.0.0.1:8000/api/makanan');
        if (!makananRes.ok) throw new Error('Gagal fetch makanan');
        const makananData = await makananRes.json();
        const filtered = makananData.filter(item => item.kategori?.id_kategori === parseInt(id));
        setRecipes(filtered);

        const kategoriRes = await fetch(`http://127.0.0.1:8000/api/kategori/${id}`);
        if (!kategoriRes.ok) throw new Error('Gagal fetch kategori');
        const kategoriData = await kategoriRes.json();

        setCategoryName(kategoriData.nama_kategori || 'Kategori');
        setCategoryDescription(kategoriData.deskripsi || '');
        setLoading(false);
      } catch (err) {
        console.error('Fetch error:', err);
        setError(true);
        setLoading(false);
      }
    };

    fetchData();
  }, [id]);

  return (
    <Layout>
      <motion.div
        key={id }
        className="container mx-auto px-4 py-10"
        initial={{ opacity: 0, y: 50 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5 }}
      >
        <h1 className="text-3xl font-bold text-orange-600 mb-8">
          {categoryName || 'Kategori'}
        </h1>

        {categoryDescription && (
          <p className="text-gray-700 mb-6 text-justify ">{categoryDescription}</p>
        )}

        {loading && <p className="text-gray-500">Memuat resep...</p>}
        {error && <p className="text-red-500">Gagal memuat data.</p>}

        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
          {recipes.map(recipe => (
            <Link key={recipe.id_makanan} to={`/detail/${recipe.id_makanan}`}>
              <RecipeItem
                title={recipe.nama_makanan}
                image={`http://127.0.0.1:8000/storage/makanan_photos/${recipe.gambar}`}
                description={recipe.deskripsi}
              />
            </Link>
          ))}
        </div>
      </motion.div>
    </Layout>
  );
};

export default CategoryPage;
