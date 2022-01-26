import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Link } from "react-router-dom";
import { useHistory, useParams } from "react-router-dom/cjs/react-router-dom.min";
import { toast } from "react-toastify";


const EditProduct = () => {

    const dispatch = useDispatch();
    const history = useHistory();

    const [name, setName] = useState("");
    const [description, setDescription] = useState("");
    const [price, setPrice] = useState("");
    const [quantity, setQuantity] = useState("");

    const { id } = useParams();
    const products = useSelector(state => state);
    // const currentProduct = products.find(product => product.id === parseInt(id));

    // useEffect(() => {
    //     //     if (currentProduct) {
    //     //         setName(currentProduct.name);
    //     //         setDescription(currentProduct.description);
    //     //         setPrice(currentProduct.price);
    //     //         setQuantity(currentProduct.quantity);
    //     //     }
    //     // }, [currentProduct]);

    // });
    const getProduct = async () => {
        try {
            const response = await fetch(`http://localhost:8888/yii/productApi/frontend/web/index.php/products/${id}`);
            if (!response.ok) {
                throw new Error('Something went wrong!');
            }
            const data = await response.json();
            console.log(data);
            // setProduct(data);
            setName(data.name);
            setDescription(data.description);
            setPrice(data.price);
            setQuantity(data.quantity);

        }
        catch (error) {
            console.log(error.message);
        }
    };

    useEffect(() => {
        getProduct();
    }, []);

    const handleSubmit = (e) => {
        e.preventDefault();


        if (!name || !description || !price || !quantity) {
            return toast.warning("Please fill in all fields!!");
        }

        const data = {
            name,
            description,
            price,
            quantity
        };

        dispatch({ type: "UPDATE_PRODUCT", payload: { data, id } });
        toast.success("Product updated successfully!!");
        history.push("/");
    };

    return (
        <div className="container-fluid">
            <h1 className="text-center text-dark py-3 display-2">Edit Product id : {id}</h1>
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
                                value="Update Product"
                            />
                            <Link
                                to={"/"}
                                className="btn btn-danger mx-2"
                            >Cancel</Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}

export default EditProduct;