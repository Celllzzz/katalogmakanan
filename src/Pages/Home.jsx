import { useEffect, useRef, useState } from 'react';
import { useLocation } from 'react-router-dom';
import { motion } from 'framer-motion';
import Layout from '../components/Layout_temp';
import HeroSection from '../components/HeroSection';
import PopularCategories from '../sections/Home/PopularCategories';
import LatestRecipes from '../sections/Home/LatestRecipe';
import AllRecipe from '../sections/Home/AllRecipe';

const Home = () => {
  const allRecipeTitleRef = useRef(null);
  const location = useLocation();

  
  useEffect(() => {
    if (location.hash === '#recipes' && allRecipeTitleRef.current) {
      allRecipeTitleRef.current.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  }, [location]);

  return (
    <Layout>
      
      <motion.div
        initial={{ opacity: 0, y: 50 }}   // Animasi dimulai dengan elemen dari bawah
        animate={{ opacity: 1, y: 0 }}     // Elemen bergerak ke posisi semula
        transition={{ duration: 0.5 }}       // Durasi animasi 1 detik
      >
        <HeroSection />
      </motion.div>
      <LatestRecipes />
      <PopularCategories />
      <AllRecipe titleRef={allRecipeTitleRef} />
    </Layout>
  );
};

export default Home;
