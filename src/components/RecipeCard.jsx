

const RecipeCard = ({ title, image, rank, id }) => {
  return (
    <div className="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 ease-in-out hover:-translate-y-1 hover:shadow-lg cursor-pointer">
      <img src={image} alt={title} className="w-full h-48 object-cover" />
      <div className="p-4">
        <h3 className="text-lg font-semibold text-orange-600 mb-1">{title}</h3>
        <p className="text-sm text-gray-500">#{rank}</p>
      </div>
    </div>
  );
};

export default RecipeCard;
