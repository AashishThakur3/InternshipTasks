import React from 'react';
import { Route, Switch } from 'react-router-dom';
import { ToastContainer } from 'react-toastify';
import './App.css';
import Navbar from './components/Navbar';
import Home from './components/Home';
import AddProduct from './components/AddProduct';
import EditProduct from './components/EditProduct';

const App = () => {
  return (
    <div className="App">
      <ToastContainer />
      <Navbar />
      <Switch>
        <Route exact path="/"><Home /></Route>
        <Route exact path="/add">
          <AddProduct />
        </Route>
        <Route exact path="/edit/:id">
          <EditProduct />
        </Route>
        <h1>Product Details</h1>
      </Switch>
    </div>
  );
}

export default App;
