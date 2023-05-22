const addToCart = (productId)=>{
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({
            productId
        })
    })
    .then(response => response.json())
    .then(data => {
        location.reload();
    })
    .catch(error => {
        console.log(error);
    });
}

const removeToCart = (productId)=>{
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/cart', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({
            productId
        })
    })
    .then(response => response.json())
    .then(data => {
        location.reload();
    })
    .catch(error => {
        console.log(error);
    });
}