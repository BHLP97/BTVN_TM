let findMax = (a=0, b=0, c=0) =>{
    if(a>b){
        if(a>c) return "a"
        else {return "c"}
    }
    else {
        if(b>c) return "b"
        else {return "c"}
    }
}

let checkLetter = (a) =>{
    if(a.match(/[a-z]/)){
        return 'Chữ cái in thường'
    }
    else if(a.match(/[A-Z]/)){
        return 'Chữ cái in hoa'
    }
    else{
        return 'Ký tự đặc biệt'
    }
}

let checkSameSign = (a=0, b=0) =>{
    if (a *b > 0) return 'Cả hai số đều cùng dấu'
    else {return 'Cả hai số không cùng dấu'}
}

let checkYear = (a) =>{
    if((a%4 === 0 && a%100 != 0) || a%400 === 0){
        return 'Năm ' + a +' là năm nhuận'
    } else {
        return 'Năm '+ a +' không phải là năm nhuận'
    }
}

let findMin = (a=0, b=0, c=0) =>{
    if(a<b){
        if(a<c) return "a"
        else {return "c"}
    }
    else {
        if(b<c) return "b"
        else {return "c"}
    }
}

let checkTriangle = (a, b, c) =>{
    if(findMax(a, b, c) === findMin(a, b, c)){
        return 'Tam giác đều'
    }else{
        if(a==b || b==c || a==c){
            console.log(b**2 == a**2 + c**2)
            return 'Tam giác cân'
        }
        else if('a' === findMax(a, b, c)){
            if(a**2 == b**2 + c**2){
                console.log(b**2 == a**2 + c**2)
                return 'Tam giác vuông'
            }else{ return 'Tam giác thường' }
        }
        else if('b' === findMax(a, b, c)){
            if(b**2 == a**2 + c**2){
                console.log(b**2 == a**2 + c**2)
                return 'Tam giác vuông'
            }else{ return 'Tam giác thường' }
        }
        else if('c' === findMax(a, b, c)){
            if(c**2 == a**2 + b**2){
                console.log(b**2 == a**2 + c**2)
                return 'Tam giác vuông'
            }else{ return 'Tam giác thường' }
        }
        else{
            return 'Tam giác thường'
        }
    }
}

let canDriveCar = (a) =>{
    if(a<18) return 'Không đủ tuổi để lái xe'
    else {return 'Đủ tuổi để lái xe'}
}

console.log(findMax(1,3,2) + '\n' + checkLetter('B') + '\n' + checkSameSign(-1, 1) + '\n' + checkYear(2000) + '\n' + checkTriangle(3,5,4) + '\n' + canDriveCar(17))

let printFizzBuzz = (a) =>{
    let res = ''
    if(a%3 === 0) res += 'Fizz'
    if(a%5 === 0) res += 'Buzz'
    return res;
}

let resolveEquation1 = (a, b) =>{
    if(a != 0) return (-b/a)
    else {return 'no solutions found'}
}

let resolveEquation2 = (a, b, c) =>{
    if(a != 0) return ('The solutions are ' + (-b + Math.sqrt(b**2 - 4*a*c))/(2*a) + ' and ' + (-b - Math.sqrt(b**2 - 4*a*c))/(2*a))
    else {
        if(b != 0) return (-b/c)
        else {return 'no solutions found'}
    }
}

let calcBMI = (a,b) =>{
    return a/(b**2)
}

let convertCelToFar = (a) =>{
    return (a * (9/5)) + 32
}

console.log(printFizzBuzz(15), resolveEquation1(2,1), resolveEquation2(5, 6, 1), calcBMI(75, 1.8), convertCelToFar(1))