import RecipeItem from './RecipeItem';
import { Link } from 'react-router-dom';

const CategorySection = ({ title, recipes, id_kategori }) => {
  return (
    <div className="mb-10">
      {/* Judul dan Link "Lihat lebih banyak" */}
      <div className="flex justify-between items-center mb-4">
        <h3 className="text-lg font-bold">{title}</h3>
        <Link
          to={`/kategori/${id_kategori}`}
          title="Lihat semua"
          className="flex items-center gap-1 text-sm text-black transition-all duration-300 hover:translate-x-9 "
        >
          <span className="font-medium">Lihat lebih banyak</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            strokeWidth={1.5}
            stroke="currentColor"
            className="w-5 h-5 md:w-6 md:h-6 transition-transform duration-300"
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
            />
          </svg>
        </Link>
      </div>

  

      {/* Grid Resep */}
      <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
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
    </div>
  );
};

export default CategorySection;
