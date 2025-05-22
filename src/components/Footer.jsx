const Footer = () => {
  return (
    <footer className="bg-gray-100 py-6 text-center text-sm text-gray-500">
      <div className="container mx-auto flex flex-col sm:flex-row justify-between items-center gap-2 px-4">
        <div className="flex flex-wrap gap-4 justify-center sm:justify-start">
          <a href="#" className="hover:underline">Privacy Policy</a>
          <a href="#" className="hover:underline">Terms</a>
          <a href="#" className="hover:underline">Recipe</a>
          <a href="#" className="hover:underline">Order.uk</a>
        </div>
        <p className="text-xs mt-2 sm:mt-0">Copyright 2025 All Rights Reserved.</p>
      </div>
    </footer>
  );
};

export default Footer;
