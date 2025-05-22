import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';

const SearchCard = ({ type, data }) => {
  const navigate = useNavigate();
  const [image, setImage] = useState('');
  const [deskripsi, setDeskripsi] = useState('');

  useEffect(() => {
    if (type === 'kategori') {
      fetch(`http://127.0.0.1:8000/api/kategori/${data.id_kategori}`)
        .then(res => res.json())
        .then(detail => {
          if (detail.makanan && detail.makanan.length > 0) {
            setImage(`http://127.0.0.1:8000/storage/makanan_photos/${detail.makanan[0].gambar}`);
          }
          setDeskripsi(detail.deskripsi || '');
        })
        .catch(err => console.error('Failed to fetch kategori detail:', err));
    } else if (type === 'makanan') {
      setImage(`http://127.0.0.1:8000/storage/makanan_photos/${data.gambar}`);
      setDeskripsi(data.deskripsi || '');
    }
  }, [type, data]);

  const handleClick = () => {
    if (type === 'kategori') {
      navigate(`/kategori/${data.id_kategori}`);
    } else {
      navigate(`/detail/${data.id_makanan}`);
    }
  };

  return (
    <div
      onClick={handleClick}
      className="flex cursor-pointer bg-white shadow-md rounded-xl overflow-hidden mb-4 transform transition-all duration-300 hover:shadow-xl hover:scale-[1.02]"
    >
      <img
        src={image}
        alt="thumbnail"
        className="w-40 h-40 object-cover flex-shrink-0"
      />
      <div className="p-4 flex flex-col justify-center">
        <h2 className="text-xl font-bold text-orange-500 mb-2">
          {type === 'kategori' ? data.nama_kategori : data.nama_makanan}
        </h2>
        <p className="text-gray-600 line-clamp-3">{deskripsi}</p>
      </div>
    </div>
  );
};

export default SearchCard;
