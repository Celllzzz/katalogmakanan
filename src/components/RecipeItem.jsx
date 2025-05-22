import { useState } from 'react';

const RecipeItem = ({ title, image, description }) => {
  const [isHovered, setIsHovered] = useState(false);

  return (
    <div
      className="bg-white shadow-lg rounded-lg p-4 flex items-center gap-4 w-full transform transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl cursor-pointer"
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={() => setIsHovered(false)}
    >
      {/* Gambar */}
      <div className="w-24 h-24 flex-shrink-0 rounded-md overflow-hidden bg-gray-100">
        <img src={image} alt={title} className="w-full h-full object-cover" />
      </div>

      {/* Teks */}
      <div className="flex-1 h-full flex flex-col justify-center">
        <p className="text-orange-600 font-semibold text-lg mb-1">{title}</p>
        <div
          className="text-sm text-gray-600 overflow-hidden transition-all duration-500 ease-in-out"
          style={{
            maxHeight: isHovered ? '8rem' : '2.5rem',
          }}
        >
          {description}
        </div>
      </div>
    </div>
  );
};

export default RecipeItem;
