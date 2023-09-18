<?php

function sumArray($arr) {
    return array_reduce($arr, function ($partialSum, $current) {
        return $partialSum + $current;
    });
}

// Gọi hàm để kiểm tra kết quả
$array = [1, 2, 3, 4, 5];
$result = sumArray($array);
echo "Tổng các phần tử trong mảng là: " . $result ."<br>";

function isPrimeNumber($num) {
    $i=2;
    while($i<$num){
        if($num % $i == 0){
            return false;
        }
        $i+=1;
    }
    return true;
}

// Gọi hàm để kiểm tra kết quả
$number = rand(3,77);
if (isPrimeNumber($number)) {
    echo $number . " là số nguyên tố." ."<br>";
} else {
    echo $number . " không là số nguyên tố." ."<br>";
}

function findMaxValue($arr) {
    $max = $arr[0];
    for($i=1; $i<count($arr); $i++){
        if($max < $arr[$i]) $max = $arr[$i];
    }
    return $max;
}
// Gọi hàm để kiểm tra kết quả
$array = [10, 5, 8, 20, 3];
$result = findMaxValue($array);
echo "Giá trị lớn nhất trong mảng là: " . $result ."<br>";

function countOccurrences($arr, $value) {
    $occurences = 0;
    for($i=1; $i<count($arr); $i++) {
        if($arr[$i] == $value) $occurences++;
    }
    return $occurences;
}

// Gọi hàm để kiểm tra kết quả
$array = [1, 2, 3, 4, 2, 5, 2];
$valueToFind = 2;
$result = countOccurrences($array, $valueToFind);
echo "Số lần xuất hiện của " . $valueToFind . " trong mảng là: " . $result ."<br>";

function reverseArray($arr) {
    return array_reverse($arr);
}

// Gọi hàm để kiểm tra kết quả
$array = [1, 2, 3, 4, 5];
$result = reverseArray($array);
echo "Mảng sau khi đảo ngược là: " ."<br>";
print_r($result);

function sumDivisibleBy3Or5($arr) {
    $sum = 0;
    for($i=0; $i<count($arr); $i++){
        if($arr[$i] % 3 || $arr[$i] % 5) $sum += $arr[$i];
    }
    return $sum;
}

// Gọi hàm để kiểm tra kết quả
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$result = sumDivisibleBy3Or5($array);
echo "Tổng các số chia hết cho 3 hoặc 5 trong mảng là: " . $result ."<br>";

function factorial($n) {
    $i = 1;
    $product = 1;
    while ($i<=$n){
        $product *= $i;
        $i++;
    }
    return $product;
}

// Gọi hàm để kiểm tra kết quả
$number = 5;
$result = factorial($number);
echo "Giai thừa của " . $number . " là: " . $result ."<br>";

function findKthLargest($arr, $k) {
    arsort($arr);
    $orderedArray = [];
    foreach ($arr as $val){
        array_push($orderedArray, $val);
    }
    return $orderedArray[$k-1];
}

// Gọi hàm để kiểm tra kết quả
$array = [10, 5, 8, 20, 3];
$k = 2;
$result = findKthLargest($array, $k);
echo "Phần tử lớn thứ " . $k . " trong mảng là: " . $result ."<br>";
