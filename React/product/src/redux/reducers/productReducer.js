const initialState = [

]



const productReducer = (state = initialState, action) => {
    switch (action.type) {
        case "ADD_PRODUCT":
            // state = [...state, action.payload];
            // return state;
            const getProduct = async () => {
                await fetch("http://localhost:8888/yii/productApi/frontend/web/index.php/products", {
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify(action.payload)
                });
            }
            getProduct();
            return;
        case "UPDATE_PRODUCT":
            // const updateState = state.map(product => product.id === action.payload.id ? action.payload : product);
            // state = updateState;
            // return state;
            const updateProduct = async () => {
                await fetch(`http://localhost:8888/yii/productApi/frontend/web/index.php/products/${action.payload.id}`, {

                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    method: "PUT",
                    body: JSON.stringify(action.payload.data)
                });
            }
            updateProduct();
            return;
        case "DELETE_CONTACT":
            // const filterProducts = state.filter((product) => product.id !== action.payload && product);
            // state = filterProducts;
            // return state;
            const deleteProduct = async () => {
                await fetch(`http://localhost:8888/yii/productApi/frontend/web/index.php/products/${action.payload.id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-type': 'application/json'
                    }
                });
            }
            deleteProduct();
            return;
        default: return state;
    }
}

export default productReducer;