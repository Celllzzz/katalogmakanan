import React, { useEffect, useState } from 'react';
import Layout from '../components/Layout_temp';
import HeroSectionDetail from '../components/HeroSectionDetail';
import RecipeDetail from '../components/RecipeDetail';
import { useParams } from 'react-router-dom';
import { motion } from 'framer-motion';

const Detail = () => {
  const { id } = useParams();
  const [makanan, setMakanan] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(false);

  useEffect(() => {
    setTimeout(() => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }, 100);
  }, []);

  useEffect(() => {
    fetch(`http://127.0.0.1:8000/api/makanan/${id}`)
      .then(res => {
        if (!res.ok) throw new Error('Gagal fetch');
        return res.json();
      })
      .then(data => {
        setMakanan(data);
        setLoading(false);
      })
      .catch(err => {
        console.error('Fetch error:', err);
        setError(true);
        setLoading(false);
      });
  }, [id]);

  if (loading) return <p className="text-center mt-10 text-gray-500">Memuat data...</p>;
  if (error || !makanan) return <p className="text-center mt-10 text-red-500">Gagal memuat data.</p>;

  return (
    <Layout>
      <motion.div
        key={makanan.id_makanan}
        className="max-w-5xl mx-auto px-4 py-10"
        initial={{ opacity: 0, y: 50 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5 }}
      >
        <HeroSectionDetail 
          judul={makanan.nama_makanan}
          foto={`http://127.0.0.1:8000/storage/makanan_photos/${makanan.gambar}`}
          idKategori={makanan.id_kategori}
        />
        <RecipeDetail
          background={makanan.deskripsi}
          resep={makanan.resep}
          tahapPembuatan={makanan.cara_masak}
        />
      </motion.div>
    </Layout> 
  );
};

export default Detail;
