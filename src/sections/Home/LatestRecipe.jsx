import { useEffect, useState, useRef } from 'react';
import { Link } from 'react-router-dom';
import RecipeCard from '../../components/RecipeCard';
import { motion, useInView } from 'framer-motion';

const LatestRecipes = () => {
  const [recipes, setRecipes] = useState([]);
  const [loading, setLoading] = useState(true); // State untuk menunjukkan loading
  const [error, setError] = useState(false);    // State untuk menangani error
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: "-100px" });

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/makanan') // Ganti sesuai URL API kamu
      .then((res) => {
        if (!res.ok) throw new Error('Gagal fetch'); // Lempar error jika respons tidak OK
        return res.json();
      })
      .then((data) => {
        // Sort berdasarkan created_at terbaru → terlama
        const sorted = data
          .sort((a, b) => new Date(b.created_at) - new Date(a.created_at))
          .slice(0, 3); // Ambil 3 resep terbaru

        setRecipes(sorted);   // Simpan data resep
        setLoading(false);    // Nonaktifkan loading setelah data di-set
      })
      .catch((err) => {
        console.error('Fetch error:', err); // Log detail error ke konsol
        setError(true);       // Set error ke true agar UI bisa menampilkan pesan error
        setLoading(false);    // Set loading ke false karena proses selesai meskipun gagal
      });
  }, []);

  return (
    <motion.section
      ref={ref}
      className="py-10 bg-white"
      initial={{ opacity: 0, y: 40 }}
      animate={isInView ? { opacity: 1, y: 0 } : {}}
      transition={{ duration: 0.8 }}
    >
      <div className="container mx-auto px-4">
        <h2 className="text-2xl font-bold text-center mb-6">Resep Makanan Terbaru!</h2>

        {/* Tampilkan indikator loading saat data sedang dimuat */}
        {loading && <p className="text-center text-gray-500">Memuat...</p>}

        {/* Tampilkan pesan error jika terjadi kegagalan dalam pengambilan data */}
        {error && <p className="text-center text-red-500">Gagal memuat data.</p>}

        {/* Tampilkan konten hanya jika tidak loading dan tidak error */}
        {!loading && !error && (
          <div className="grid md:grid-cols-3 gap-6">
            {recipes.map((recipe, index) => (
              <Link key={recipe.id_makanan} to={`/detail/${recipe.id_makanan}`}>
                <RecipeCard
                  id={recipe.id_makanan}
                  title={recipe.nama_makanan}
                  image={`http://127.0.0.1:8000/storage/makanan_photos/${recipe.gambar}`}
                  rank={index + 1}
                />
              </Link>
            ))}
          </div>
        )}
      </div>
    </motion.section>
  );
};

export default LatestRecipes;
