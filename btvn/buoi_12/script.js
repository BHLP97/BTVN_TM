//Bài 1
function repeatString(string, numRepeat, join_character){
    let ans = "";
    for(let i = 1; i<= numRepeat; i++){
        ans += string;
        if (i != numRepeat){
            ans += join_character;
        }
    }
    return ans;
}

//Bài 2
function calculateSum_For1(startNum, endNum, divideNum){
    let sum = 0;  
    for(let i = Math.min(startNum, endNum); i <= Math.max(startNum, endNum); i++){
        if(i%divideNum === 0) sum += i;
    }  
    return sum;
}

function calculateSum_While1(startNum, endNum, divideNum){
    let sum = 0;  
    let i = Math.min(startNum, endNum);
    while(i <= Math.max(startNum, endNum)){
        if(i%divideNum === 0) sum += i;
        i += 1;
    }
    return sum;
}

//Bài 3
function calculateSphericalVolume(r){
    let volume = 0;  // The tich
    volume = 4/3 * 3.14159 * r**3;
    return volume;
}

//Bài 4
function calculateSum_For2(Num1, Num2){
    let sum = 0;  
    for(let i = Math.min(Num1, Num2)+1; i < Math.max(Num1, Num2); i++)
        sum += i;
    return sum;
}

function calculateSum_While2(Num1, Num2){
    let sum = 0;  
    let i = Math.min(Num1, Num2)+1;
    while (i < Math.max(Num1, Num2)){
        sum += i;
        i += 1;
    }
    return sum;
}

//Bài 5
function isPrime(num){
    for(let i = 2; i < num; i++)
        if(num%i === 0) return false;
    return true;
}

//Bài 6
function calculateSumPrimeNumber_For(startNum, endNum){
    let sum = 0;
    for(let i = Math.min(startNum, endNum); i <= Math.max(startNum, endNum); i++){
        if(isPrime(i) && i != 1) sum += i;
    }
    return sum
}

function calculateSumPrimeNumber_While(startNum, endNum){
    let sum = 0;
    let i = Math.min(startNum, endNum);
    while (i <= Math.max(startNum, endNum)){
        if(isPrime(i) && i != 1) sum += i;
        i += 1;
    }
    return sum;
}

//Bài 7
function sumDivide_For(num){
    let sum = 0;
    for(let i = 1; i <= num; i++)
        if(num%i === 0) sum += i; 
    return sum;
  }

function sumDivide_While(num){
    let sum = 0;
    let i = 1;
    while(i >= num)
        if(num%i === 0) sum += i; 
        i += 1;
    return sum;
}

console.log(repeatString('a', 10, '-'), calculateSum_For1(8,3), calculateSphericalVolume(1), calculateSum_For2(8,3), isPrime(3), calculateSumPrimeNumber_For(1, 10), sumDivide_For(10));