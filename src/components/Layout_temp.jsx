import Header from './Header_temp';
import Footer from './Footer';

  
const Layout = ({ children }) => {
  return (
    <div className="font-sans min-h-screen flex flex-col">
      <Header />
      

      {/* Page content */}
      <main className="flex-1">
        {children}
      </main>

      <Footer />
    </div>
  );
};

export default Layout;
  