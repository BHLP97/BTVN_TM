let a = prompt()
let b = prompt()
let c = prompt()

function higherNumber(a,b){
    if(a>b) return a
    else if(b>a) {return b}
    else{return}
}

function parityNumber(a){
    if(a%2 === 0) return 'a là số chẵn'
    else{return 'a là số lẻ'}
}

function divisionNumber(a){
    if(a%3 === 0 && a%5 === 0) return 'a có đồng thời chia hết cho 3 và 5'
    else{return 'a không có đồng thời chia hết cho 3 và 5'}
}

function sumNumber(a, b, c){
    if(parseInt(c) === parseInt(a)+parseInt(b)) return 'c là tổng của a và b'
    else{return 'c không phải là tổng của a và b'}
}

function gradeNumber(a){
    if(a >= 85) return 'A'
    else if(a >= 70) return 'B'
    else if(a >= 45) return 'C'
    else {return 'D'}
}

console.log(higherNumber(a,b), '\n', parityNumber(a), '\n', divisionNumber(a), '\n', sumNumber(a, b, c), '\n', gradeNumber(a))