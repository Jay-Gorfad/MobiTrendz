/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
function validateAddProductForm() {
    let isValid = true;

    // Clear previous error messages
    document.getElementById("productNameError").innerHTML = "";
    document.getElementById("productImageError").innerHTML = "";
    document.getElementById("productPriceError").innerHTML = "";
    document.getElementById("productDiscountError").innerHTML = "";
    document.getElementById("productStockError").innerHTML = "";
    document.getElementById("productDescriptionError").innerHTML = "";

    // Product Name Validation
    const productName = document.getElementById("productName").value;
    const productNameError = document.getElementById("productNameError");

    if (productName.trim() === "") {
        productNameError.style.color = "red";
        productNameError.innerHTML = "Product name is required.";
        isValid = false;
    } else {
        productNameError.innerHTML = "";  // Clear any previous error message
    }

    // Product Image Validation
    const productImage = document.getElementById("productImage").files[0];
    const productImageError = document.getElementById("productImageError");

    if (!productImage) {
        productImageError.style.color = "red";
        productImageError.innerHTML = "Product image is required.";
        isValid = false;
    } else {
        productImageError.innerHTML = "";  // Clear any previous error message
    }

    // Product Price Validation
    const productPrice = document.getElementById("productPrice").value;
    const productPriceError = document.getElementById("productPriceError");

    if (productPrice.trim() === "" || isNaN(productPrice) || parseFloat(productPrice) <= 0) {
        productPriceError.style.color = "red";
        productPriceError.innerHTML = "Please enter a valid price.";
        isValid = false;
    } else {
        productPriceError.innerHTML = "";  // Clear any previous error message
    }

    // Product Discount Validation (Optional)
    const productDiscount = document.getElementById("productDiscount").value;
    const productDiscountError = document.getElementById("productDiscountError");

    if (productDiscount && (isNaN(productDiscount) || parseFloat(productDiscount) < 0 || parseFloat(productDiscount) > 100)) {
        productDiscountError.style.color = "red";
        productDiscountError.innerHTML = "Please enter a valid discount between 0 and 100.";
        isValid = false;
    } else {
        productDiscountError.innerHTML = "";  // Clear any previous error message
    }

    // Product Stock Validation
    const productStock = document.getElementById("productStock").value;
    const productStockError = document.getElementById("productStockError");

    if (productStock.trim() === "" || isNaN(productStock) || parseInt(productStock) < 0) {
        productStockError.style.color = "red";
        productStockError.innerHTML = "Please enter a valid stock quantity.";
        isValid = false;
    } else {
        productStockError.innerHTML = "";  // Clear any previous error message
    }

    // Product Description Validation
    const productDescription = document.getElementById("productDescription").value;
    const productDescriptionError = document.getElementById("productDescriptionError");

    if (productDescription.trim() === "") {
        productDescriptionError.style.color = "red";
        productDescriptionError.innerHTML = "Product description is required.";
        isValid = false;
    } else {
        productDescriptionError.innerHTML = "";  // Clear any previous error message
    }

    return isValid;
}



function validateAddReviewForm() {
    let isValid = true;

    // Product ID Validation
    const productid = document.getElementById('productid');
    const productidError = document.getElementById('productidError');
    if (!productid.value.trim()) {
        productidError.style.color = 'red';  // Set error text color to red
        productidError.textContent = 'Product ID is required.';
        isValid = false;
    } else {
        productidError.textContent = '';
    }

    // User ID Validation
    const userid = document.getElementById('userid');
    const useridError = document.getElementById('useridError');
    if (!userid.value.trim()) {
        useridError.style.color = 'red';  // Set error text color to red
        useridError.textContent = 'User ID is required.';
        isValid = false;
    } else {
        useridError.textContent = '';
    }

    // Rating Validation
    const rating = document.getElementById('rating');
    const ratingError = document.getElementById('ratingError');
    if (rating.value === '') {
        ratingError.style.color = 'red';  // Set error text color to red
        ratingError.textContent = 'Rating is required.';
        isValid = false;
    } else {
        ratingError.textContent = '';
    }

    // Review Validation
    const review = document.getElementById('review');
    const reviewError = document.getElementById('reviewError');
    if (review.value.trim() === '') {
        reviewError.style.color = 'red';  // Set error text color to red
        reviewError.textContent = 'Review is required.';
        isValid = false;
    } else if (review.value.length > 500) {
        reviewError.style.color = 'red';  // Set error text color to red
        reviewError.textContent = 'Review must be less than 500 characters.';
        isValid = false;
    } else {
        reviewError.textContent = '';
    }

    return isValid;
}

function validateAddOrderForm() {
    let isValid = true;

    // User ID Validation
    const userId = document.getElementById('userId').value.trim();
    const userIdError = document.getElementById('userIdError');
    if (userId === '') {
        userIdError.style.color = 'red';
        userIdError.textContent = 'User ID is required.';
        isValid = false;
    } else {
        userIdError.textContent = '';
    }

    // Order Date Validation
    const orderDate = document.getElementById('orderDate').value.trim();
    const orderDateError = document.getElementById('orderDateError');
    if (orderDate === '') {
        orderDateError.style.color = 'red';
        orderDateError.textContent = 'Order Date is required.';
        isValid = false;
    } else {
        orderDateError.textContent = '';
    }

    // Product and Quantity Validation
    for (let i = 1; i <= productCount; i++) {
        const productId = document.getElementById(`productId${i}`).value.trim();
        const productIdError = document.getElementById(`productId${i}Error`);
        const quantity = document.getElementById(`quantity${i}`).value.trim();
        const quantityError = document.getElementById(`quantity${i}Error`);

        if (productId === '') {
            productIdError.style.color = 'red';
            productIdError.textContent = 'Product ID is required.';
            isValid = false;
        } else {
            productIdError.textContent = '';
        }

        if (quantity === '' || quantity <= 0) {
            quantityError.style.color = 'red';
            quantityError.textContent = 'Quantity must be at least 1.';
            isValid = false;
        } else {
            quantityError.textContent = '';
        }
    }

    // Shipping Address Validation
    const shippingAddress = document.getElementById('shippingAddress').value.trim();
    const shippingAddressError = document.getElementById('shippingAddressError');
    if (shippingAddress === '') {
        shippingAddressError.style.color = 'red';
        shippingAddressError.textContent = 'Shipping Address is required.';
        isValid = false;
    } else {
        shippingAddressError.textContent = '';
    }

    // Billing Address Validation
    const billingAddress = document.getElementById('billingAddress').value.trim();
    const billingAddressError = document.getElementById('billingAddressError');
    if (billingAddress === '') {
        billingAddressError.style.color = 'red';
        billingAddressError.textContent = 'Billing Address is required.';
        isValid = false;
    } else {
        billingAddressError.textContent = '';
    }

    // Order Status Validation
    const orderStatus = document.getElementById('orderStatus').value.trim();
    const orderStatusError = document.getElementById('orderStatusError');
    if (orderStatus === '') {
        orderStatusError.style.color = 'red';
        orderStatusError.textContent = 'Order Status is required.';
        isValid = false;
    } else {
        orderStatusError.textContent = '';
    }

    return isValid;
}



function validateAddCategoryForm() {
    let isValid = true;

    // Clear previous error messages
    const categoryNameError = document.getElementById('categoryNameError');
    const parentCategoryError = document.getElementById('parentCategoryError');

    categoryNameError.textContent = '';
    parentCategoryError.textContent = '';

    // Set error message color to red
    categoryNameError.style.color = 'red';
    parentCategoryError.style.color = 'red';

    // Validate Category Name
    const categoryName = document.getElementById('categoryName').value.trim();
    if (categoryName === '') {
        categoryNameError.textContent = 'Category name is required.';
        isValid = false;
    }

    // Validate Parent Category Selection
    const parentCategory = document.getElementById('parentCategory').value;
    if (parentCategory === '') {
        parentCategoryError.textContent = 'Please select a parent category.';
        isValid = false;
    }

    return isValid;
}




function validateAddUserForm() {
    let isValid = true;

    // First Name Validation
    const firstName = document.getElementById('firstName');
    const firstNameError = document.getElementById('firstNameError');
    if (!firstName.value.trim()) {
        firstNameError.textContent = 'First Name is required.';
        firstNameError.style.color = 'red'; // Ensure error text is red
        isValid = false;
    } else {
        firstNameError.textContent = '';
    }

    // Last Name Validation
    const lastName = document.getElementById('lastName');
    const lastNameError = document.getElementById('lastNameError');
    if (!lastName.value.trim()) {
        lastNameError.textContent = 'Last Name is required.';
        lastNameError.style.color = 'red'; // Ensure error text is red
        isValid = false;
    } else {
        lastNameError.textContent = '';
    }

    // Email Validation
    const email = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim()) {
        emailError.textContent = 'Email is required.';
        emailError.style.color = 'red'; // Ensure error text is red
        isValid = false;
    } else if (!emailRegex.test(email.value)) {
        emailError.textContent = 'Email must be a valid email address.';
        emailError.style.color = 'red'; // Ensure error text is red
        isValid = false;
    } else {
        emailError.textContent = '';
    }

    // Phone Validation
    const phone = document.getElementById('phone');
    const phoneError = document.getElementById('phoneError');
    const phoneRegex = /^[0-9]{10}$/; // Assumes phone numbers are 10 digits
    if (!phone.value.trim()) {
        phoneError.textContent = 'Phone is required.';
        phoneError.style.color = 'red'; // Ensure error text is red
        isValid = false;
    } else if (!phoneRegex.test(phone.value)) {
        phoneError.textContent = 'Phone must be a valid 10-digit number.';
        phoneError.style.color = 'red'; // Ensure error text is red
        isValid = false;
    } else {
        phoneError.textContent = '';
    }

    // Password Validation
    const password = document.getElementById('password');
    const passwordError = document.getElementById('passwordError');
    if (!password.value.trim()) {
        passwordError.textContent = 'Password is required.';
        passwordError.style.color = 'red'; // Ensure error text is red
        isValid = false;
    } else if (password.value.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters long.';
        passwordError.style.color = 'red'; // Ensure error text is red
        isValid = false;
    } else {
        passwordError.textContent = '';
    }

    return isValid;
}


function validateAddOfferForm() {
    let isValid = true;

    // Clear previous error messages
    const offerDescriptionError = document.getElementById('offerDescriptionError');
    const discountError = document.getElementById('discountError');
    const minOrderError = document.getElementById('minOrderError');

    if (!offerDescriptionError || !discountError || !minOrderError) {
        console.error('Error elements not found.');
        return false;
    }

    offerDescriptionError.textContent = '';
    discountError.textContent = '';
    minOrderError.textContent = '';

    // Validate Offer Description
    const offerDescription = document.getElementById('offerDescription').value.trim();
    if (offerDescription === '') {
        offerDescriptionError.style.color = 'red';
        offerDescriptionError.textContent = 'Offer description is required.';
        isValid = false;
    }

    const offerCode = document.getElementById('offerCode').value.trim();
    if (offerCode === '') {
        offerCodeError.style.color = 'red';
        offerCodeError.textContent = 'Offer Code is required.';
        isValid = false;
    }

    // Validate Discount
    const discountValue = document.getElementById('discount').value.trim();
    const discount = parseFloat(discountValue);
    if (discountValue === '' || isNaN(discount) || discount <= 0) {
        discountError.style.color = 'red';
        discountError.textContent = 'Please enter a valid discount amount.';
        isValid = false;
    }

    const maxdiscount = document.getElementById('maxdiscount').value.trim();
    if (maxdiscount === '') {
        maxdiscountError.style.color = 'red';
        maxdiscountError.textContent = 'Please enter a valid Max Discount is required.';
        isValid = false;
    }

    // Validate Minimum Order
    const minOrderValue = document.getElementById('minOrder').value.trim();
    const minOrder = parseFloat(minOrderValue);
    if (minOrderValue === '' || isNaN(minOrder) || minOrder <= 0) {
        minOrderError.style.color='red';
        minOrderError.textContent = 'Please enter a valid minimum order amount.';
        isValid = false;
    }

    
    return isValid;
}


// function validateAddOfferForm() {
//     let isValid = true;

//     document.getElementById('offerDescriptionError').innerText = '';
//     document.getElementById('discountError').innerText = '';
//     document.getElementById('minOrderError').innerText = '';

//     const offerDescription = document.getElementById('offerDescription').value.trim();
//     if (offerDescription === '') {
//         document.getElementById('offerDescriptionError').innerText = 'Offer description is required.';
//         isValid = false;
//     }

//     const discount = document.getElementById('discount').value.trim();
//     if (discount === '') {
//         document.getElementById('discountError').innerText = 'Discount is required.';
//         isValid = false;
//     } else if (isNaN(discount) || discount <= 0) {
//         document.getElementById('discountError').innerText = 'Please enter a valid discount amount.';
//         isValid = false;
//     }

//     const minOrder = document.getElementById('minOrder').value.trim();
//     if (minOrder === '' || (isNaN(minOrder) || minOrder <= 0)) {
//         document.getElementById('minOrderError').innerText = 'Please enter a valid minimum order amount.';
//         isValid = false;
//     }

//     return isValid;
// }



function validateAddBannerForm() {
    let isValid = true;

    document.getElementById('bannerImageError').textContent = '';
    document.getElementById('bannerURLError').textContent = '';
    document.getElementById('bannerOrderError').textContent = '';

    const bannerImage = document.getElementById('bannerImage');
    if (bannerImage.files.length === 0) {
        bannerImageError.style.color = 'red';
        document.getElementById('bannerImageError').textContent = 'Please upload a banner image.';
        isValid = false;
    }

    const bannerURL = document.getElementById('bannerURL').value.trim();
    const urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-]*)*\/?$/;
    if (bannerURL === '') {
        bannerURLError.style.color = 'red';
        document.getElementById('bannerURLError').textContent = 'Banner URL is required.';
        isValid = false;
    } else if (!urlPattern.test(bannerURL)) {
        document.getElementById('bannerURLError').textContent = 'Please enter a valid URL.';
        isValid = false;
    }

    const bannerOrder = document.getElementById('bannerOrder').value.trim();
    if (bannerOrder === '') {
        bannerOrderError.style.color = 'red';
        document.getElementById('bannerOrderError').textContent = 'View order is required.';
        isValid = false;
    } else if (isNaN(bannerOrder) || bannerOrder <= 0) {
        document.getElementById('bannerOrderError').textContent = 'Please enter a valid order number.';
        isValid = false;
    }

    return isValid;
}


