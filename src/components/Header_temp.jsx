import { useState, useEffect,useRef } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import SearchPreview from './SearchPreview';

const Header = () => {
  const [query, setQuery] = useState('');
  const [foodResults, setFoodResults] = useState([]);
  const [categoryResults, setCategoryResults] = useState([]);
  const [showDropdown, setShowDropdown] = useState(false);
  const navigate = useNavigate();
  const [isFocused, setIsFocused] = useState(false);
  const searchRef = useRef(null);

  useEffect(() => {
    const delayDebounce = setTimeout(() => {
      if (query.length >= 0) {
        fetch(`http://127.0.0.1:8000/api/search?search=${encodeURIComponent(query)}`)
          .then(res => res.json())
          .then(data => {
            setFoodResults(data.makanan.results || []);
            setCategoryResults(data.kategori || []);
            setShowDropdown(true);
          })
          .catch(err => {
            console.error('Search error:', err);
            setFoodResults([]);
            setCategoryResults([]);
          });
      } else {
        setShowDropdown(false);
        setFoodResults([]);
        setCategoryResults([]);
      }
    }, 300);

    return () => clearTimeout(delayDebounce);
  }, [query]);

    
  const handleSearch = () => {
    if (query.trim()) {
      navigate(`/search?q=${encodeURIComponent(query)}`);
      setShowDropdown(false);
    }
  };

  const handleHomeClick = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  return (
    <header className="bg-white py-4 sticky top-0 z-50">
      <div className="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
        {/* Navigation */}
        <nav className="flex gap-6 text-base font-semibold">
          <Link to="/" onClick={handleHomeClick} className="relative group">
            Home
            <span className="absolute left-0 -bottom-1 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
          </Link>
          <Link to="/#recipes" className="relative group">
            Recipe
            <span className="absolute left-0 -bottom-1 w-0 h-0.5 bg-black transition-all duration-300 group-hover:w-full"></span>
          </Link>
        </nav>

        {/* Search Bar */}
        <div className="relative w-full md:w-auto">
          <div className="flex border border-gray-300 rounded-full overflow-hidden bg-white">
            <input
              type="text"
              placeholder="Mau makan apa hari ini?"
              className="px-4 py-2 w-full outline-none text-sm text-gray-700 bg-transparent border-0 transition-all duration-500 hover:bg-orange-500 hover:text-white focus:bg-orange-500 focus:text-white"
              value={query}
              onChange={(e) => setQuery(e.target.value)}
              onFocus={() => setIsFocused(true)}
              onBlur={() => setTimeout(() => setIsFocused(false), 150)}
            />
            <button
              onClick={handleSearch}
              className="bg-orange-500 text-white px-6 py-2 text-sm font-medium hover:bg-white hover:text-black transition-colors duration-500"
            >
              Search
            </button>
          </div>

          {isFocused && query.length > 0 &&(
            <SearchPreview
              foodResults={foodResults}
              categoryResults={categoryResults}
              onSelect={() => setIsFocused(false)} // atau tetap true kalau mau tetap buka
              query={query}
            />
          )}
        </div>
      </div>
    </header>
  );
};

export default Header;
