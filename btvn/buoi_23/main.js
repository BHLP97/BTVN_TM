/*
		Designed by: SELECTO
		Original image: https://dribbble.com/shots/5311359-Diprella-Login
*/

var arrUsers = [
    {
        name: 'John',
        email: 'test@gmail.com',
        password: 'SecretPass',
        wallet: 500
    }
]

let switchCtn = document.querySelector("#switch-cnt");
let switchC1 = document.querySelector("#switch-c1");
let switchC2 = document.querySelector("#switch-c2");
let switchCircle = document.querySelectorAll(".switch__circle");
let switchBtn = document.querySelectorAll(".switch-btn");
let aContainer = document.querySelector("#a-container");
let bContainer = document.querySelector("#b-container");
let allButtons = document.querySelectorAll(".submit");
let inputEmail = document.querySelector("#email_signin");
let inputPassword = document.querySelector("#password_signin");
let inputNameSignUp = document.querySelector("#name_signup");
let inputEmailSignUp = document.querySelector("#email_signup");
let inputPasswordSignUp = document.querySelector("#password_signup");

let getButtons = (e) => e.preventDefault()

let changeForm = (e) => {

    switchCtn.classList.add("is-gx");
    setTimeout(function(){
        switchCtn.classList.remove("is-gx");
    }, 1500)

    switchCtn.classList.toggle("is-txr");
    switchCircle[0].classList.toggle("is-txr");
    switchCircle[1].classList.toggle("is-txr");

    switchC1.classList.toggle("is-hidden");
    switchC2.classList.toggle("is-hidden");
    aContainer.classList.toggle("is-txl");
    bContainer.classList.toggle("is-txl");
    bContainer.classList.toggle("is-z200");

}

let mainF = (e) => {
    for (var i = 0; i < allButtons.length; i++)
        allButtons[i].addEventListener("click", getButtons );
    for (var i = 0; i < switchBtn.length; i++)
        switchBtn[i].addEventListener("click", changeForm)
}

window.addEventListener("load", mainF);

function ValidateEmail(input) {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (input.value.match(validRegex)) {
        /* document.form1.text1.focus(); */
        return true;
    } else {
        /* document.form1.text1.focus(); */
        return false;
    }

}

function signin(){
    if(inputEmail.value === ''){
        alert("The email field is empty.");
    } else if(inputPassword.value === '') {
        alert("The password field is empty.");
    } else {
        if(ValidateEmail(inputEmail)){
            let user = arrUsers.find((elem)=>elem.email);
            if(user.email && user.password){
                localStorage.setItem('arrUsers', JSON.stringify(arrUsers));
                window.location = "http://127.0.0.1:5500/btvn/buoi_23/views/homepage.html";  
            } else {
                alert("Incorrect email or password.");
            }
        } else {
            alert("Invalid email address!");
        }
    }
}

function signup(){
    if(inputNameSignUp.value === ''){
        alert("The name field is empty.");
    } else if(inputEmailSignUp.value === '') {
        alert("The email field is empty.");
    } else if(inputPasswordSignUp.value === '') {
        alert("The password field is empty.");
    } else {
        if(ValidateEmail(inputEmailSignUp)){
            arrUsers.push({
                name: inputNameSignUp.value,
                email: inputEmailSignUp.value,
                password: inputPasswordSignUp.value,
                wallet: 300
            })
            localStorage.setItem('arrUsers', JSON.stringify(arrUsers));
            alert("Your account has been registered succesfully! You may now log in.");
        } else {
            alert("Invalid email address!");
        }
    }
}
