import { useEffect, useState, useRef } from 'react';
import CategoryCard from '../../components/CategoryCard';
import { Link } from 'react-router-dom';
import { motion, useInView } from 'framer-motion';

const PopularCategories = () => {
  const [categories, setCategories] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: "-100px" });

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/makanan')
      .then(res => {
        if (!res.ok) throw new Error('Gagal fetch');
        return res.json();
      })
      .then(data => {
        const grouped = {};

        data.forEach(item => {
          if (!item.kategori) return;

          const id = item.kategori.id_kategori;
          const nama = item.kategori.nama_kategori;

          if (!grouped[id]) {
            grouped[id] = {
              id,
              nama,
              count: 0,
              image: item.gambar,
            };
          }

          grouped[id].count += 1;
        });

        const result = Object.values(grouped)
          .sort((a, b) => b.count - a.count)
          .slice(0, 4);

        setCategories(result);
        setLoading(false);
      })
      .catch(err => {
        console.error('Gagal memuat kategori:', err);
        setError(true);
        setLoading(false);
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
        <h2 className="text-2xl font-bold text-center mb-6">Resep Makanan Terbanyak!</h2>

        {loading && <p className="text-center text-gray-500">Memuat...</p>}
        {error && <p className="text-center text-red-500">Gagal memuat data.</p>}

        {!loading && !error && (
          <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
            {categories.map(cat => (
              <Link key={cat.id} to={`/kategori/${cat.id}`}>
                <CategoryCard
                  id={cat.id}
                  title={cat.nama}
                  image={`http://127.0.0.1:8000/storage/makanan_photos/${cat.image}`}
                  count={cat.count}
                />
              </Link>
            ))}
          </div>
        )}
      </div>
    </motion.section>
  );
};

export default PopularCategories;
