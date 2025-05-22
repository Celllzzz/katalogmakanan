const HeroSection = () => {
    return (
      <section className="bg-white py-12">
        <div className="container mx-auto rounded-xl border border-gray-200 overflow-hidden">
          <div className="flex flex-col md:flex-row items-center justify-between">
            {/* Left content with padding */}
            <div className="md:w-1/2 text-left space-y-4 py-10 px-6 md:px-10 z-10">
              <img src="/logo(2).png" alt="Logo FUIYOH" className="w-18 h-auto" />
              <h1 className="text-4xl font-extrabold text-orange-600">FUIYOH!!</h1>
              <p className="text-2xl font-semibold text-gray-900">
                Resep Masakan yang<br />Oishi dan Sugoi.
              </p>
            </div>
  
            {/* Right orange shape */}
            <div className="md:w-1/2 h-full">
              <div className="w-full h-[200px] md:h-[300px] bg-orange-500 rounded-tl-[200px] md:rounded-tl-[400px]"></div>
            </div>
          </div>
        </div>
      </section>
    );
  };
  
export default HeroSection;
  