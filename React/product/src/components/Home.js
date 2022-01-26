import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Link } from "react-router-dom";
import { toast } from "react-toastify";

const Home = () => {

    const products = useSelector(state => state);

    const dispatch = useDispatch();

    const [product, setProduct] = useState([]);

    const deleteProduct = (id) => {
        dispatch({ type: "DELETE_CONTACT", payload: id });
        toast.success("contact deleted successfully");
    }
    const getProduct = async () => {
        try {
            const response = await fetch('http://localhost:8888/yii/productApi/frontend/web/index.php/products');
            if (!response.ok) {
                throw new Error('Something went wrong!');
            }
            const data = await response.json();
            console.log(data);
            setProduct(data);
        }
        catch (error) {
            console.log(error.message);
        }
    };

    useEffect(() => {
        getProduct();
    }, []);
    return (
        <div className="container">
            <div className="row d-flex flex-column">
                <Link to="/add" className="btn btn-outline-dark my-5 ml-auto ">
                    Add Contact
                </Link>
                <div className="col-md-10 mx-auto my-4">
                    <table className="table table-hover">
                        <thead className="table-header bg-dark text-white">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                                product.map((product) =>
                                (<tr key={product.id}>
                                    <td>{product.id}</td>
                                    <td>{product.name}</td>
                                    <td>{product.description}</td>
                                    <td>{product.price}</td>
                                    <td>{product.quantity}</td>
                                    <td><Link
                                        to={`/edit/${product.id}`}
                                        className="btn btn-sm btn-primary mr-1"
                                    >
                                        Edit
                                    </Link><button
                                        type="button"
                                        onClick={() => deleteProduct(product.id)}
                                        className="btn btn-sm btn-danger"
                                    >
                                            Delete
                                        </button></td>
                                </tr>
                                ))}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
}

export default Home;