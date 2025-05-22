import { useEffect, useState, useRef } from 'react';
import CategorySection from '../../components/CategorySection';
import { motion, useInView } from 'framer-motion';

const AllRecipesSection = ({ titleRef }) => {
  const [categories, setCategories] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: "-100px" });

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/makanan')
      .then((res) => {
        if (!res.ok) throw new Error('Gagal fetch');
        return res.json();
      })
      .then((data) => {
        const grouped = {};

        data.forEach(item => {
          if (!item.kategori) return;
          const id = item.kategori.id_kategori;
          const nama = item.kategori.nama_kategori;

          if (!grouped[id]) {
            grouped[id] = { id_kategori: id, nama_kategori: nama, recipes: [] };
          }
          grouped[id].recipes.push(item);
        });

        const result = Object.values(grouped).map(kat => ({
          ...kat,
          recipes: kat.recipes.slice(0, 4),
        }));

        setCategories(result);
        setLoading(false);
      })
      .catch(err => {
        console.error('Gagal memuat resep:', err);
        setError(true);
        setLoading(false);
      });
  }, []);

  return (
    <motion.section
      ref={ref}
      className="py-12 bg-white"
      initial={{ opacity: 0, y: 40 }}
      animate={isInView ? { opacity: 1, y: 0 } : {}}
      transition={{ duration: 0.8 }}
    >
      <div className="container mx-auto px-4">
        <h2 ref={titleRef} className="text-2xl font-bold text-center mb-10 scroll-mt-24">
          Semua Resep
        </h2>

        {loading && <p className="text-center text-gray-500">Memuat...</p>}
        {error && <p className="text-center text-red-500">Gagal memuat data.</p>}

        {!loading && !error && categories.map(kategori => (
          <CategorySection
            key={kategori.id_kategori}
            title={kategori.nama_kategori}
            recipes={kategori.recipes}
            id_kategori={kategori.id_kategori}
          />
        ))}
      </div>
    </motion.section>
  );
};

export default AllRecipesSection;
