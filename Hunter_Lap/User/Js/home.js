// Load cart from localStorage or initialize empty
let cart = JSON.parse(localStorage.getItem('cart')) || [];
const cartModal = document.querySelector('.cart-modal');
const cartItemsContainer = document.querySelector('.cart-modal-content .products');
const cartTotal = document.querySelector('.cart-total');
const cartCount = document.querySelector('.cart-count');
const cartBtn = document.querySelector('.cart-btn');
const closeBtn = document.querySelector('.close-btn');
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

// Toggle hamburger menu
hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

// Add to cart
document.querySelectorAll('.product-card .add-to-cart').forEach(button => {
    button.addEventListener('click', (e) => {
      //  e.preventDefault(); // مهم عشان نوقف الـ default action بتاع الزرار لو كان link
        const productId = parseInt(e.target.dataset.id);
        const productName = e.target.dataset.name;
        const productPrice = parseFloat(e.target.dataset.price);

        // هنا بنعمل الـ HTTP request لـ cart_add.php
        fetch('cart_add.php', {
            method: 'GET', // أو 'GET' حسب طريقة الـ backend بتاعتك، بس 'POST' أفضل لإضافة بيانات
            headers: {
                'Content-Type': 'application/json', // بنحدد نوع المحتوى اللي بنبعته
            },
            body: JSON.stringify({ // بنبعت البيانات في الـ body كـ JSON
                id: productId,
                quantity: 1 // بنضيف item واحد في كل مرة
            }),
        })
            .then(response => response.json()) // بنحول الـ response لـ JSON
            .then(data => {
                // هنا بنشوف الـ response اللي جاي من الـ backend
                if (data.success) { // لو الـ backend بعت 'success: true' مثلاً
                    // ممكن هنا نعمل update للـ cart في الـ frontend لو محتاجين
                    // بما إنك كنت بتستخدم localStorage، ممكن نخلي الكود زي ما هو:
                    const existingItem = cart.find(item => item.id === productId);
                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        cart.push({ id: productId, name: productName, price: productPrice, quantity: 1 });
                    }
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCart(); // دي الدالة اللي بتحدث عرض السلة عندك
                    alert(`${productName} تمت إضافته إلى السلة بنجاح!`);
                } else {
                    alert(`حدث خطأ عند إضافة ${productName} إلى السلة: ${data.message || 'خطأ غير معروف'}`);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                alert('حدث خطأ في الاتصال بالخادم. حاول مرة أخرى.');
            });
    });
});
/*document.querySelectorAll('.product-card .add-to-cart').forEach(button => {
    button.addEventListener('click', (e) => {
        // e.preventDefault();
        const productId = parseInt(e.target.dataset.id);
        const productName = e.target.dataset.name;
        const productPrice = parseFloat(e.target.dataset.price);
        const existingItem = cart.find(item => item.id === productId);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ id: productId, name: productName, price: productPrice, quantity: 1 });
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
        alert(`${productName} تمت إضافته إلى السلة!`);
    });
});
*/
// Open cart modal
cartBtn.addEventListener('click', () => {
    cartModal.style.display = 'flex';
    updateCart();
});

// Close cart modal
closeBtn.addEventListener('click', () => {
    cartModal.style.display = 'none';
});

// Close modal when clicking outside
cartModal.addEventListener('click', (e) => {
    if (e.target === cartModal) {
        cartModal.style.display = 'none';
    }
});

// Update cart display
function updateCart() {
    cartItemsContainer.innerHTML = '';
    let total = 0;
    let totalItems = 0;
    cart.forEach((item, index) => {
        total += item.price * item.quantity;
        totalItems += item.quantity;
        const itemElement = document.createElement('div');
        itemElement.classList.add('cart-item');
        itemElement.innerHTML = `
          <p>${item.name}</p>
          <p>الكمية: ${item.quantity}</p>
          <p>${item.price * item.quantity} جنيه</p>
          <div class="action-buttons">
            <button class="delete-btn" data-index="${index}">حذف</button>
          </div>
        `;
        cartItemsContainer.appendChild(itemElement);
    });

    // Add event listeners for delete buttons
    document.querySelectorAll('.cart-item .delete-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            const index = parseInt(e.target.dataset.index);
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        });
    });

    cartTotal.textContent = `الإجمالي: ${total} جنيه`;
    cartCount.textContent = totalItems;
}

// Initial cart update
updateCart();