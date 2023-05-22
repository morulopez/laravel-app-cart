window.onload=()=>{
    document.querySelector('.cart-icon').addEventListener('click',()=>{
        document.querySelector('.cart').classList.toggle("show-cart");
    })
    getAllProductsCart();
}