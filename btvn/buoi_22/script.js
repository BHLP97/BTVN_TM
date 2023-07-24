var products = [
    {
        id: 1,
        name: 'Laptop Asus',
        description: 'Lorem ipsum dolor sit amet',
        category: 'Laptop',
        price: 20
    },
    {
        id: 2,
        name: 'Laptop Acer',
        description: 'Máy tính Acer',
        category: 'Laptop',
        price: 19
    },
    {
        id: 3,
        name: 'Macbook',
        description: 'Mạc bục air',
        category: 'Laptop',
        price: 21
    },
    {
        id: 4,
        name: 'Iphone 13 pro max',
        description: 'Phone 13',
        category: 'Phone',
        price: 30
    },
    {
        id: 5,
        name: 'Iphone 14 pro max',
        description: 'Phone 14',
        category: 'Phone',
        price: 35
    },
    {
        id: 6,
        name: 'Laptop Asusa',
        description: 'Lorem ipsum dolor sit amet',
        category: 'Laptop',
        price: 20
    },
    {
        id: 7,
        name: 'Laptop Acera',
        description: 'Máy tính Acer',
        category: 'Laptop',
        price: 19
    },
    {
        id: 8,
        name: 'Macbooka',
        description: 'Mạc bục air',
        category: 'Laptop',
        price: 21
    },
    {
        id: 9,
        name: 'Iphone 13 pro maxa',
        description: 'Phone 13',
        category: 'Phone',
        price: 30
    },
    {
        id: 10,
        name: 'Iphone 14 pro maxa',
        description: 'Phone 14',
        category: 'Phone',
        price: 35
    },
    {
        id: 11,
        name: 'Laptop Asusb',
        description: 'Lorem ipsum dolor sit amet',
        category: 'Laptop',
        price: 20
    },
    {
        id: 12,
        name: 'Laptop Acerb',
        description: 'Máy tính Acer',
        category: 'Laptop',
        price: 19
    },
    {
        id: 13,
        name: 'Macbookb',
        description: 'Mạc bục air',
        category: 'Laptop',
        price: 21
    },
    {
        id: 14,
        name: 'Iphone 13 pro maxb',
        description: 'Phone 13',
        category: 'Phone',
        price: 30
    },
    {
        id: 15,
        name: 'Iphone 14 pro maxb',
        description: 'Phone 14',
        category: 'Phone',
        price: 35
    },
    {
        id: 16,
        name: 'Laptop Asusc',
        description: 'Lorem ipsum dolor sit amet',
        category: 'Accessory',
        price: 20
    },
    {
        id: 17,
        name: 'Laptop Acerc',
        description: 'Máy tính Acer',
        category: 'Accessory',
        price: 19
    },
    {
        id: 18,
        name: 'Macbookc',
        description: 'Mạc bục air',
        category: 'Accessory',
        price: 21
    },
    {
        id: 19,
        name: 'Iphone 13 pro maxc',
        description: 'Phone 13',
        category: 'Accessory',
        price: 30
    },
    {
        id: 20,
        name: 'Iphone 14 pro maxc',
        description: 'Phone 14',
        category: 'Accessory',
        price: 35
    }
];

var vouchers = [
    {
        id: 1,
        code: 'ABC',
        value: 10,
        type: 'percent'
    },
    {
        id: 2,
        code: 'XYZ',
        value: 20,
        type: 'dollar'
    }
];

function renderUI(list = products) {
    let html = '';
    // let total = 0;
    if (list.length === 0) {
        html = 'Chưa có sản phẩm nào trong giỏ hàng';
    } else {
        for (let i = 0; i < list.length; i++) {
            // total += products[i].price;
            html += `<li class="row">
                    <div class="col left">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="https://via.placeholder.com/200x150" alt="" />
                            </a>
                        </div>
                        <div class="detail">
                            <div class="name"><a href="#">${ list[i].name }</a></div>
                            <div class="description">
                                ${ list[i].description }
                            </div>
                            <div class="price">$${ list[i].price }</div>
                            <div class="total-price" id="price_${list[i].id}">
                                $${list[i].price}
                            </div>
                        </div>
                    </div>
                    
                </li>`
        }
        // document.getElementsByClassName('total')[0].innerHTML = '$' + total;
    }
    document.getElementById('products').innerHTML = html;
    /* totalPrice(); */
}

renderUI();

//Arrow Function cú pháp đầy đủ
// const functionName = (item) => {
//     return item.id === id
// }

//Arrow Function cú pháp viết gọn
// const functionName = item => item.id === id

function handleOnChangeQuantity(id, price) {
    let quantity = document.getElementById('product_' + id).value;
    if (quantity !== '' && quantity <= 0) {
        document.getElementById('product_' + id).value = 1;
        quantity = 1;
    }
    // let price_id = 'price_' + id;
    // let newPrice = quantity * products.find(item => item.id === id).price; //Arrow Function
    let newPrice = quantity * price;
    document.getElementById('price_' + id).innerHTML = '$' + newPrice;
    /* totalPrice(); */
}

function handleRemoveItem(id) {
    //cách 1: dùng filter để lọc ra các sản phẩm không trùng id. Rồi gán mảng đã được filter = products cũ
    // products = products.filter(element => element.id !== id);

    //cách 2: dùng vòng lặp và sử dụng splice để loại bỏ phần tử khỏi mảng products
    // for (let i = 0; i < products.length; i++) {
    //     if (products[i].id === id) {
    //         products.splice(i, 1);
    //     }        
    // }

    //cách 3: dùng find để tìm ra phần tử product. Dùng splice để xoá
    // product = products.find(element => element.id === id);
    // products.splice(product, 1)
    renderUI();
}

/* function totalPrice(voucher = null) {
    let sum = 0;
    let sumAfterVAT = 0;
    for (let i = 0; i < products.length; i++) {
        let quantity = document.getElementById('product_' + products[i].id).value;
        sum += products[i].price * quantity;
    }

    if (sum > 100) {
        sumAfterVAT = sum + 5;
        document.querySelector('.vat span').innerHTML = 5;
    } else {
        sumAfterVAT = sum;
        document.querySelector('.vat span').innerHTML = 0;
    }
    
    if (voucher) {
        if (voucher.type === 'percent') {
            sumAfterVAT = sumAfterVAT - (sumAfterVAT * voucher.value) / 100;
        } else {
            sumAfterVAT = sumAfterVAT - voucher.value;
        }
    }

    document.getElementsByClassName('total')[0].innerHTML = '$' + sum;
    document.getElementsByClassName('cart-total')[0].innerHTML = '$' + sumAfterVAT;
} */

/* function handleVoucher() {
    let code = document.getElementById('promo-code').value;
    
    //Cách 1: Dùng find để tìm được voucher trong mảng vouchers
    let voucher = vouchers.find(voucher => voucher.code === code);

    //Cách 2: Dùng vòng for lặp ra các giá trị của vouchers
    // for (let i = 0; i < vouchers.length; i++) {
    //     if (vouchers[i].code === code) {
    //         let voucher = vouchers[i];
    //     }        
    // }

    if (! voucher) {
        document.getElementsByClassName('text-error')[0].innerHTML = 'Voucher không hợp lệ';
    } else {
        document.getElementsByClassName('text-error')[0].innerHTML = '';
        totalPrice(voucher);
    }
} */

function handleSearch(){
    let category = document.getElementById('search-category').value;
    let minPrice = document.getElementsByClassName('min-price')[0].value;
    let maxPrice = document.getElementsByClassName('max-price')[0].value;
    let keyword = document.getElementsByClassName('keyword')[0].value;
    console.log(minPrice, maxPrice)
    filteredProducts = products.filter((elem) => elem.category === category);
    if(minPrice != '') filteredProducts = filteredProducts.filter((elem) => elem.price > minPrice);
    if(maxPrice != '') filteredProducts = filteredProducts.filter((elem) => elem.price < maxPrice);
    filteredProducts = products.filter((elem) => elem.name.includes(keyword));
    renderUI(filteredProducts);
}