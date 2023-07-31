let arrProducts = [
    {
        "id": 1,
        "name": "Jordans",
        "price": 5.99,
        "desc": "Lorem Ipsum"
    },
    {
        "id": 2,
        "name": "Baretta",
        "price": 11.49,
        "desc": "Elegia Est"
    }
];

let vouchers = [
    {
        "id": 1,
        "code": 'ABC',
        "value": 10,
        "type": 'percent'
    },
    {
        "id": 2,
        "code": 'DEF',
        "value": 20,
        "type": 'dollar'
    }
]

const products = document.querySelector('.products');
let subtotalPrice = document.querySelector('.subtotal');
let vatPrice = document.querySelector('.vat > span').innerHTML.substr(1);
let discountPrice = document.querySelector('.discount-.hide');
let realPriceSpan = document.querySelector('.total > span');

let changePriceAndQuantity = (voucher = null, voucherType = null) => {
    let productQuantities = document.querySelectorAll('input.quantity');
    let totalQuantity = document.querySelector('.count');
    let sum = 0;
    let totalPrice = 0;
    let realPrice = 0;

    productQuantities.forEach((elem) => {
        if(elem.value != '' && elem.value > 0){
            sum += parseInt(elem.value);
            price = elem.parentElement.parentElement.parentElement.querySelector('.price').innerHTML;
            price = price.substr(1);
            price = parseFloat(price).toFixed(2);
            totalPrice += elem.value * price;
        } else {
            elem.value = 0;
            price = elem.parentElement.parentElement.parentElement.querySelector('.price').innerHTML;
            price = price.substr(1);
            price = parseFloat(price).toFixed(2);
            totalPrice += elem.value * price;
        }
    })

    totalPrice = parseFloat(totalPrice).toFixed(2);
    totalQuantity.innerHTML = `${sum} items in the bag`
    subtotalPrice.innerHTML = "$" + totalPrice; 
    if (totalPrice > 100) {
        realPrice = parseFloat(totalPrice) + parseFloat(vatPrice);
    } else {
        realPrice = parseFloat(totalPrice);
    }
    console.log(voucher, realPrice);
    if(voucher){
        if(voucherType == 'percent'){
            realPrice = parseFloat(realPrice - realPrice/voucher).toFixed(2);
        } else {
            realPrice = parseFloat(realPrice - voucher).toFixed(2);
        }
        console.log(voucher, realPrice);
    }
    realPriceSpan.innerHTML = "$" + realPrice;
} 
const removeProduct = (id) =>{
    let removedProduct = document.querySelector(`#row_${id}`);
    removedProduct.parentElement.removeChild(removedProduct);
    arrProducts = arrProducts.filter((elem) => elem.id != id);
    changePriceAndQuantity();
}
const handleVoucher = () =>{
    code = document.getElementById('promo-code').value;
    let res = vouchers.find(voucher => voucher.code === code);
    if(res == ''){
        alert('This voucher code does not exist')
    } else {
        changePriceAndQuantity(res.value, res.type);
    }
}
const renderUI = (arr) => {
    if(arr.length === 0) {
        products.innerHTML += "No product is available currently";
    } else {
        arr.forEach((elem) => {
            products.innerHTML += `
                <li class="row" id="row_${elem.id}">
                    <div class="col left">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="https://via.placeholder.com/200x150" alt="" />
                            </a>
                        </div>
                        <div class="detail">
                            <div class="name"><a href="#">${elem.name}</a></div>
                            <div class="description">
                                ${elem.desc}
                            </div>
                            <div class="price">$${elem.price}</div>
                        </div>
                    </div>
    
                    <div class="col right">
                        <div class="quantity">
                            <input type="number" id="${elem.id}" onchange='changePriceAndQuantity()' class="quantity" step="1" value="0" />
                        </div>
    
                        <div class="remove">
                            <span class="close" onclick='removeProduct(${elem.id})'><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </li>
            `;
        })
    }
    changePriceAndQuantity();
}
renderUI(arrProducts);

