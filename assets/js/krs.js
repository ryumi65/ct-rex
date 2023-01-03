const products = [{
    id: '001',
    idm: 'IF2020',
    name: 'Integelensia Buatan',
    weight: 3,
    category: 'Wajib',
    visible: true
},
{
    id: '002',
    idm: 'IF2021',
    name: 'Integelensia Alami',
    weight: 3,
    category: 'Wajib',
    visible: true
}];

let cart = {
    items: [],
    totalPrice: 0
};

function renderAllProducts() {
    const productTable = document.getElementById('products');
    productTable.innerHTML = '';

    products.forEach((product, index) => {
        if (product.visible === true) {
            productTable.innerHTML += `
            <tr id="${product.id}">
                <td></td>
                <td>${product.idm}</td>
                <td>${product.name}</td>
                <td>${product.weight}</td>
                <td>${product.category}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <button
                            class="btn btn-success"
                            onclick="addToCart(${index})"
                        >
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </td>
            <tr>`;
        }
    });
}

function renderAllCartItems() {
    const cartItemTable = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');
    let totalPrice = 0;
    cartItemTable.innerHTML = '';

    if (cart.items.length === 0) {
        cartItemTable.innerHTML = `
        <tr>
            <td colspan="5">Belum ada Matkul</td>
        </tr>`;
    }

    cart.items.forEach((cartItem) => {
        totalPrice += cartItem.total
        cartItemTable.innerHTML += `
        <tr>
            <td></td>
            <td>${cartItem.id}</td>
            <td>${cartItem.name}</td>
            <td>${cartItem.weight}</td>
            <td>${cartItem.category}</td>
            <td>
                <div class="d-flex justify-content-center">
                    <button
                        class="btn btn-danger"
                        onclick="removeFromCart('${cartItem.name}')"
                    >
                        Hapus
                    </button>
                </div>
            </td>
        <tr>`;
    });

    totalPriceElement.innerText = `Total SKS : ${totalPrice}`;
}

function addToCart(productIndex) {
    const product = products[productIndex];
    product.visible = false;

    let newCartItems = cart.items.reduce((state, item) => {
        return [...state, item];
    }, []);

    newCartItems.push({
        ...product,
        quantity: 1,
        total: product.weight
    });

    cart = {
        ...cart,
        items: newCartItems
    };
    
    renderAllProducts();
    renderAllCartItems();
}

function removeFromCart(productName) {
    let isAlreadyInCart = false;

    let newCartItems = cart.items.reduce((state, item) => {
        if (item.name === productName) {
            isAlreadyInCart = true;
            const newItem = {
                ...item,
                quantity: item.quantity - 1,
                total: (item.quantity - 1) * item.weight
            };

            if (newItem.quantity !== 0) return [...state, newItem];
            else return state;
        }

        return [...state, item];
    }, []);

    products.forEach((product) => {
        if (productName === product.name) product.visible = true;
    });

    cart = {
        ...cart,
        items: newCartItems
    };

    renderAllProducts();
    renderAllCartItems();
}

renderAllProducts();
renderAllCartItems();