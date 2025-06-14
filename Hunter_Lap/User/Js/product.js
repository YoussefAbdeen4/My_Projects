// // Sample products data
// const products = [
//     {
//         id: 1,
//         name: "سماعات لاسلكية",
//         price: 199,
//         description: "سماعات لاسلكية بجودة صوت عالية، بطارية تدوم حتى 20 ساعة، وتصميم مريح.",
//         image: "https://via.placeholder.com/600x400"
//     },
//     {
//         id: 2,
//         name: "هاتف ذكي",
//         price: 2999,
//         description: "هاتف ذكي بمعالج قوي، كاميرا بدقة 48 ميجابكسل، وشاشة AMOLED.",
//         image: "https://via.placeholder.com/600x400"
//     },
//     {
//         id: 3,
//         name: "ساعة ذكية",
//         price: 799,
//         description: "ساعة ذكية تدعم تتبع اللياقة، إشعارات الهاتف، وتصميم أنيق.",
//         image: "https://via.placeholder.com/600x400"
//     },
//     {
//         id: 4,
//         name: "لاب توب",
//         price: 4999,
//         description: "لاب توب عالي الأداء بمعالج Intel i7، ذاكرة 16 جيجابايت، وشاشة 15 بوصة.",
//         image: "https://via.placeholder.com/600x400"
//     }
// ];

// Load cart from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];
let cartModal, cartItemsContainer, cartTotal, cartCount, cartBtn, closeBtn;

// Wait for DOM to load
document.addEventListener('DOMContentLoaded', () => {
    cartModal = document.querySelector('.cart-modal');
    cartItemsContainer = document.querySelector('.products'); // تم تعديلها لتطابق product.html
    cartTotal = document.querySelector('.cart-total');
    cartCount = document.querySelector('.cart-count');
    cartBtn = document.querySelector('.cart-btn');
    closeBtn = document.querySelector('.close-btn');

    // Update cart count in navbar
    // function updateCartCount() {
    //     const count = cart.reduce((sum, item) => sum + (item.quantity || 0), 0);
    //     if (cartCount) {
    //         cartCount.textContent = count;
    //     }
    // }

    // Load product details
    // const urlParams = new URLSearchParams(window.location.search);
    // const productId = parseInt(urlParams.get('id'));
    // const product = products.find(p => p.id === productId);
    //
    // if (product) {
    //     document.getElementById('product-name').textContent = product.name;
    //     document.getElementById('product-price').textContent = `${product.price} جني  ه`;
    //     document.getElementById('product-description').textContent = product.description;
    //     document.querySelector('.product-image img').src = product.image;
    //     document.querySelector('.product-image img').alt = product.name;
    // } else {
    //     document.querySelector('.product-details').innerHTML = '<p>المنتج غير موجود!</p>';
    // }

    // Add to cart
    // const addToCartBtn = document.querySelector('.add-to-cart-btn');
    // if (addToCartBtn) {
    //     addToCartBtn.addEventListener('click', () => {
    //         if (product) {
    //             const existingItem = cart.find(item => item.id === product.id);
    //             if (existingItem) {
    //                 existingItem.quantity = (existingItem.quantity || 0) + 1;
    //             } else {
    //                 cart.push({ id: product.id, name: product.name, price: product.price, quantity: 1, currency: 'جنيه' });
    //             }
    //             localStorage.setItem('cart', JSON.stringify(cart));
    //             updateCart();
    //             updateCartCount();
    //             alert(`${product.name} تمت إضافته إلى السلة!`);
    //         }
    //     });
    // }

    // Buy now
    const buyNowBtn = document.querySelector('.buy-now-btn');
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', () => {
            if (product) {
                alert(`تم شراء ${product.name} بقيمة ${product.price} جنيه بنجاح!`);
                cart = cart.filter(item => item.id !== product.id);
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCart();
                updateCartCount();
                if (cartModal) cartModal.style.display = 'none';
            }
        });
    }

    // Open cart modal
    if (cartBtn) {
        cartBtn.addEventListener('click', () => {
            if (cartModal) {
                cartModal.style.display = 'flex';
                setTimeout(updateCart, 100); // Delay to ensure DOM is ready
            }
        });
    }

    // Close cart modal
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            if (cartModal) cartModal.style.display = 'none';
        });
    }

    // Close modal when clicking outside
    if (cartModal) {
        cartModal.addEventListener('click', (e) => {
            if (e.target === cartModal) {
                cartModal.style.display = 'none';
            }
        });
    }

    // Update cart display
    function updateCart() {
        if (cartItemsContainer && cartTotal && cartCount) {
            cartItemsContainer.innerHTML = '';
            let total = 0;
            let totalItems = 0;

            console.log('Cart content:', cart); // Debugging

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p>السلة فارغة</p>';
            } else {
                cart.forEach((item, index) => {
                    total += (item.price || 0) * (item.quantity || 0);
                    totalItems += item.quantity || 0;
                    const itemElement = document.createElement('div');
                    itemElement.classList.add('cart-item');
                    itemElement.innerHTML = `
                        <p>${item.name || 'منتج مجهول'}</p>
                        <p>الكمية: ${item.quantity || 1}</p>
                        <p>${(item.price * item.quantity) || 0} ${item.currency || 'جنيه'}</p>
                        <div class="action-buttons">
                            <button class="delete-btn" data-index="${index}">حذف</button>
                        </div>
                    `;
                    cartItemsContainer.appendChild(itemElement);
                });
            }

            document.querySelectorAll('.cart-item .delete-btn').forEach(button => {
                button.addEventListener('click', (e) => {
                    const index = e.target.dataset.index;
                    cart.splice(index, 1);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCart();
                    updateCartCount();
                });
            });

            if (cartTotal) cartTotal.textContent = `الإجمالي: ${total} ${cart[0]?.currency || 'جنيه'}`;
            if (cartCount) cartCount.textContent = totalItems;
        } else {
            console.error('Required elements (.products, .cart-total, .cart-count) not found!');
        }
    }

    // Initial updates
    updateCart();
    updateCartCount();
});