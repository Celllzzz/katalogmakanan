import { useLocation } from 'react-router-dom';
import { useEffect, useState } from 'react';
import SearchCard from '../components/SearchCard';
import Layout from '../components/Layout_temp';
import { motion } from 'framer-motion';

const SearchResultPage = () => {
  const location = useLocation();
  const query = new URLSearchParams(location.search).get('q');
  const [foods, setFoods] = useState([]);
  const [categories, setCategories] = useState([]);

  useEffect(() => {
    if (query) {
      fetch(`http://127.0.0.1:8000/api/search?search=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
          setFoods(data.makanan?.results || []);
          setCategories(data.kategori || []);
        })
        .catch(error => console.error('Error fetching search results:', error));
    }
  }, [query]);

  return (
    <Layout>
      <motion.div
        key={query}
        className="max-w-4xl mx-auto px-4 py-10"
        initial={{ opacity: 0, y: 50 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8 }}
      >
        <h1 className="text-3xl font-bold mb-8 text-gray-800">
          Hasil Pencarian untuk: <span className="text-orange-500">{query}</span>
        </h1>

        {categories.length > 0 && (
          <>
            <h2 className="text-xl font-semibold text-gray-700 mb-4">Kategori</h2>
            <div className="space-y-4 mb-8">
              {categories.map(cat => (
                <SearchCard
                  key={`cat-${cat.id_kategori}`}
                  type="kategori"
                  data={cat}
                />
              ))}
            </div>
          </>
        )}

        {foods.length > 0 && (
          <>
            <h2 className="text-xl font-semibold text-gray-700 mb-4">Makanan</h2>
            <div className="space-y-4">
              {foods.map(food => (
                <SearchCard
                  key={`food-${food.id_makanan}`}
                  type="makanan"
                  data={food}
                />
              ))}
            </div>
          </>
        )}

        {foods.length === 0 && categories.length === 0 && (
          <p className="text-center text-gray-500 mt-12">Tidak ada hasil ditemukan.</p>
        )}
      </motion.div>
    </Layout>
  );
};

export default SearchResultPage;
