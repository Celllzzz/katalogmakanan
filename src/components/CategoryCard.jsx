const CategoryCard = ({ title, image, count, id }) => {
  return (
    <div className="bg-gray-50 rounded-lg shadow text-center p-4 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg cursor-pointer">
      <img
        src={image}
        alt={title}
        className="w-full h-32 object-cover rounded-md mb-3"
      />
      <h3 className="text-lg font-bold">{title}</h3>
      <p className="text-sm text-orange-500">{count} Resep</p>
    </div>
  );
};

export default CategoryCard;
