import { Routes, Route } from "react-router-dom";
import Detail from "../Pages/Detail";
import Home from "../Pages/Home";
import CategoryPage from "../Pages/CategoryPage";
import SearchResultPage from "../Pages/SearchResultPage"

function RoutesIndex() {
    return(
        <Routes>
            {/* route "/" → halaman utama */}
            <Route path="/" element={<Home />} />

            {/* route "/detail/:id" → halaman detail makanan */}
            <Route path="/detail/:id" element={<Detail />} />

            <Route path="/kategori/:id" element={<CategoryPage />} />

            <Route path="/search" element={<SearchResultPage />} />
            
        </Routes>
    )
}

export default RoutesIndex;