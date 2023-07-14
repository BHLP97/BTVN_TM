// BTVN 17
//Bài 1
const heading = document.querySelector('#heading');
heading.style.color = 'red';

//Bài 2
const paras = document.querySelectorAll('.para');
paras.forEach((e) => {
    e.style.color = 'blue';
    e.style.fontSize = '20px';
});

//Bài 3
const p3 = document.querySelector('.para-3');
p3.insertAdjacentHTML('afterend', '<a href="https://facebook.com">Facebook</a>');

//Bài 4
const title = document.querySelector('#title');
title.innerHTML = 'Đây là thẻ tiêu đề';

//Bài 5
const desc = document.querySelector('.description');
desc.classList.add('text-bold');

//Bài 6
p3.innerHTML = "<button>Click me!</button>";

//Bài 7
const p2 = document.querySelector('.para-2');
const p2_copy = p2.cloneNode("p2");
p2.insertAdjacentElement("beforebegin", p2_copy);

//Bài 8
const p1 = document.querySelector('.para-1'); 
p1.parentElement.removeChild(p1);

//Câu 1
const text = document.querySelector('#text');
text.style.color = '#777';
text.style.fontSize = '2rem';
text.innerHTML = "Tôi có thể làm <em> bất cứ điều gì </em> tôi muốn với JavaScript."

//Câu 2
const ul = document.querySelector('ul');
ul.style.color = 'blue';

//Câu 3
const list = document.querySelector('#list');
list.insertAdjacentHTML('beforeend', "<li>Item 8</li><li>Item 9</li><li>Item 10</li>")
const li1 = list.querySelector('li');
li1.style.color = 'red';
const li3 = list.querySelector('li:nth-child(3)');
li3.style.color = 'green';
const li4 = list.querySelector('li:nth-child(4)');
li4.insertAdjacentHTML('afterend', "<li>Copy of Item 4</li>")
list.removeChild(li4);

// BTVN 18
//Bài 1
const input = document.querySelector('input');
const btnAdd = document.querySelector('#btnAdd');
function addLi(){
    if(input.value != ''){
        list.insertAdjacentHTML('beforeend', `<li>${input.value}</li>`);
    } else {
        alert('Cannot add when input is empty')
    }
}
btnAdd.addEventListener('click', addLi);

//Bài 2
const btnRemove = document.querySelector('#btnRemove');
function removeLi(){
    let lilast = list.querySelector('li:last-child');
    lilast.parentElement.removeChild(lilast);
}
btnRemove.addEventListener('click', removeLi);

//Bài 3
const btnToggle = document.querySelector('#toggleList');
btnToggle.addEventListener("click", function() {
    console.log(list.style.visibility);
    if(list.style.visibility == "visible"){
        list.style.visibility = "hidden";
        btnToggle.innerHTML = "Show";
    } else {
        list.style.visibility = "visible";
        btnToggle.innerHTML = "Hide";
    }
})