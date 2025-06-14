let cart = JSON.parse(localStorage.getItem('cart')) || [];
const cartItemsContainer = document.querySelector('.cart-items');
const cartTotal = document.querySelector('.cart-total');
const cartCount = document.querySelector('.cart-count');
const confirmBtn = document.querySelector('.confirm-btn');

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
            const index = e.target.dataset.index;
            cart.splice(index, 1); // Remove item from cart
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCart();
        });
    });

    cartTotal.textContent = `الإجمالي: ${total} جنيه`;
    cartCount.textContent = totalItems;
}

// Confirm purchase
confirmBtn.addEventListener('click', () => {
    const name = document.getElementById('name').value;
    const address = document.getElementById('address').value;
    const phone = document.getElementById('phone').value;
    const payment = document.getElementById('payment').value;

    if (!name || !address || !phone || !payment) {
        alert('يرجى ملء جميع الحقول!');
        return;
    }

    if (cart.length === 0) {
        alert('السلة فارغة!');
        return;
    }

    alert('تم تأكيد الشراء بنجاح!');
    cart.length = 0; // Clear cart
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
    document.getElementById('name').value = '';
    document.getElementById('address').value = '';
    document.getElementById('phone').value = '';
    document.getElementById('payment').value = '';
});

// Initial cart update
updateCart();