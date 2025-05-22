import { Link } from 'react-router-dom';
import { motion, AnimatePresence } from 'framer-motion';

const SearchPreview = ({ foodResults = [], categoryResults = [], onSelect, query = '' }) => {
  const showNotFound = query.length > 0 && foodResults.length === 0 && categoryResults.length === 0;

  return (
    
      <motion.div
        initial={{ opacity: 0, y: -5 }}
        animate={{ opacity: 1, y: 0 }}
        exit={{ opacity: 0, y: -5 }}
        transition={{ duration: 0.2 }}
        className="absolute z-10 w-full bg-white  border-white rounded-xl shadow-lg mt-2 max-h-70 overflow-y-auto outline-none"
      >

        {/* Kategori */}
        {categoryResults.length >= 1 && (
          <>
            <div className="px-4 py-2 text-sm font-semibold text-orange-500">Kategori</div>
            {categoryResults.map(cat => (
              <Link
                key={cat.id_kategori}
                to={`/kategori/${cat.id_kategori}`}
                onClick={onSelect}
                className="flex items-center gap-2 px-4 py-2 text-sm hover:bg-orange-500 hover:text-white text-gray-800 duration-300 group"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  strokeWidth={1.5}
                  stroke="currentColor"
                  className="w-5 h-5 text-black group-hover:text-white transition-colors duration-300"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                  />
                </svg>
                {cat.nama_kategori}
              </Link>

            ))}
          </>
        )}

        {/* Makanan */}
        {foodResults.length >= 1 && (
          <>
            <div className="px-4 py-2 text-sm font-semibold text-orange-500">Makanan</div>
            {foodResults.map(food => (
              <Link
                key={food.id_makanan}
                to={`/detail/${food.id_makanan}`}
                onClick={onSelect}
                className="flex items-center gap-2 px-4 py-2 text-sm hover:bg-orange-500 hover:text-white text-gray-800 duration-300 group"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  strokeWidth={1.5}
                  stroke="currentColor"
                  className="w-5 h-5 text-black group-hover:text-white transition-colors duration-300"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                  />
                </svg>
                {food.nama_makanan}
              </Link>

            ))}
          </>
        )}


        {showNotFound && (
          <div className="flex items-center justify-center px-4 py-6 text-sm text-gray-500 min-h-[20px]">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              strokeWidth={1.5}
              stroke="currentColor"
              className="w-6 h-6 text-red-500 mr-2"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M6 18 18 6M6 6l12 12"
              />
            </svg>
            <span className="text-center text-gray-600">Tidak ada hasil ditemukan</span>
          </div>
        )}
      </motion.div>
    
  );
};

export default SearchPreview;
