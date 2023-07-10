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

