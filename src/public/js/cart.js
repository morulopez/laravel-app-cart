// get all products in the cart and render in aside
const getAllProductsCart = ()=>{
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/cart', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
    })
    .then(response => response.json())
    .then(data => {
        console.log(data)
        const el = document.getElementById('productCartList');
        el.innerHTML=buildViewProductsCart(data);
        el.innerHTML+=buildTotal(data);
        return;
    })
    .catch(error => {
        console.log(error);
    });
}

// built view CartProducts aside 
const buildViewProductsCart = (data)=>{
    const {product_carts} = data.message
    return product_carts.map((data)=>{
        const {product:{name,sku,img,price,id}} = data;
        return `<div class='product-cart-list'> 
                <header>
                    <img class="product-img" src="${img}" alt="${name}"/>
                </header>
                <div>
                    <p>${sku}</p>
                </div>
                <footer>
                    <button class="btn-delete" onclick="removeToCart(${id})">Delete To Cart <i class="fas fa-cart-shopping"></i></button>
                    <p>$ ${price}</p>
                </footer>
            </div>`;
    }).join('')
}

const buildTotal = (data)=>{
    const {totalCart} = data;
    return `<div class='total-product-cart'> 
        <a href="/order" class="btn-check">Check Out</a>
        Total: $ ${totalCart}
    </div>`;
}