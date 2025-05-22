import React from 'react';
import { useNavigate } from 'react-router-dom';

const HeroSectionDetail = ({ judul, foto, idKategori }) => {
  const navigate = useNavigate();

  const handleBackClick = () => {
    navigate(`/kategori/${idKategori}`);
  };

  return (
    <div className="flex flex-col gap-6 mb-8">
      {/* Tombol Back */}
      <button
        onClick={handleBackClick}
        className="flex items-center gap-2 duration-300 text-gray-600 hover:-translate-x-9 transition-transform w-fit cursor-pointer"
      >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
          <path strokeLinecap="round" strokeLinejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
        </svg>
        <span>Kembali ke Kategori</span>
      </button>

      {/* Judul dan Gambar */}
      <div className="flex flex-col md:flex-row gap-8">
        {/* Container Judul */}
        <div className="flex-1 min-w-0 flex items-center pr-0 md:pr-[100px] ">
          <div className="bg-white p-6 rounded-2xl w-full">
            <h1 className="text-3xl md:text-5xl font-bold text-orange-600 break-words whitespace-normal leading-tight text-center md:text-left">
              {judul}
            </h1>
          </div>
        </div>

        {/* Gambar */}
        <div className="relative w-full md:w-[450px] h-[250px] md:h-[300px] shrink-0 flex items-center justify-center">
          <div className="absolute w-full h-full bg-orange-500 rounded-3xl -left-4 md:-left-20 top-0 -z-10"></div>

          <div className="absolute left-1/2 md:-left-34 top-1/2 -translate-x-1/2 md:translate-x-0 -translate-y-1/2">
            <div className="bg-white rounded-3xl p-4 shadow-lg w-[350px] md:w-[390px] h-[200px] md:h-[270px]">
              <img
                src={foto}
                alt={judul}
                className="w-full h-full object-cover rounded-3xl"
              />
            </div>
          </div>
        </div>
      </div>

    </div>

  );
};

export default HeroSectionDetail;
