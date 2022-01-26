import React, { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { useHistory } from "react-router-dom/cjs/react-router-dom.min";
import { toast } from "react-toastify";

const AddProduct = () => {


    const [name, setName] = useState("");
    const [description, setDescription] = useState("");
    const [price, setPrice] = useState("");
    const [quantity, setQuantity] = useState("");

    const products = useSelector((state) => state);

    const dispatch = useDispatch();
    const history = useHistory();

    const handleSubmit = (e) => {
        e.preventDefault();


        if (!name || !description || !price || !quantity) {
            return toast.warning("Please fill in all fields!!");
        }

        const data = {
            // id: products[products.length - 1].id + 1,
            name,
            description,
            price,
            quantity
        };

        dispatch({ type: "ADD_PRODUCT", payload: data });
        toast.success("Product added successfully!!");
        history.push("/");
    };

    return (
        <div className="container-fluid">
            <h1 className="text-center text-dark py-3 display-2">Add Product</h1>
            <div className="row">
                <div className="col-md-6 p-5 mx-auto shadow pd-5">
                    <form onSubmit={handleSubmit}>
                        <div className="form-group m-2">
                            <input
                                className="form-control"
                                type="text"
                                placeholder="Name"
                                value={name}
                                onChange={(e) => setName(e.target.value)}
                            />
                        </div>
                        <div className="form-group m-2">
                            <input
                                className="form-control"
                                type="text"
                                placeholder="Description"
                                value={description}
                                onChange={(e) => setDescription(e.target.value)}
                            />
                        </div>
                        <div className="form-group m-2">
                            <input
                                className="form-control"
                                type="number"
                                placeholder="price"
                                value={price}
                                onChange={(e) => setPrice(e.target.value)}
                            />
                        </div>
                        <div className="form-group m-2">
                            <input
                                className="form-control"
                                type="number"
                                placeholder="Quantity"
                                value={quantity}
                                onChange={(e) => setQuantity(e.target.value)}
                            />
                        </div>


                        <div className="form-group m-2">
                            <input
                                className="btn btn-block btn-dark"
                                type="submit"
                                value="Add Product"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}

export default AddProduct;