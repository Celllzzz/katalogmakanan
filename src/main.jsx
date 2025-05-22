import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';


import RoutesIndex from './Routes/Index';
import { BrowserRouter } from 'react-router-dom';


ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>

    <BrowserRouter>
      <RoutesIndex> </RoutesIndex>
    </BrowserRouter>
      
  
  </React.StrictMode>
);
