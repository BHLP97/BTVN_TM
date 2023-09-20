<?php
function multiplyByTwo($arr) {
    return array_map(fn($value): int => $value*2, $arr);
}
// Sử dụng
$input = [1, 2, 3, 4, 5];
$result = multiplyByTwo($input);
print_r($result); // Kết quả: [2, 4, 6, 8, 10]
print_r("<br>");

function sumArray($arr)
{
    return array_reduce($arr, fn($partialSum, $a) => $partialSum + $a, 0);
}

// Sử dụng
$input = [1, 2, 3, 4, 5];
$result = sumArray($input);
echo $result; // Kết quả: 15
print_r("<br>");

function filterEvenNumbers($arr) {
    return array_filter($arr, fn($value) => $value % 2 == 0);
}
// Sử dụng
$input = [1, 2, 3, 4, 5, 6];
$result = filterEvenNumbers($input);
print_r($result); // Kết quả: [2, 4, 6]
print_r("<br>");

function multiplyEvenNumbers($arr) {
    $evenArray = filterEvenNumbers($arr);
    return multiplyByTwo($evenArray);
}
// Sử dụng
$input = [1, 2, 3, 4, 5, 6];
$result = multiplyEvenNumbers($input);
print_r($result); // Kết quả: [4, 8, 12]
print_r("<br>");

function sumOddNumbers($arr) {
    $oddArray = array_filter($arr, fn($value) => $value % 2 == 1);
    return sumArray($oddArray);
}
// Sử dụng
$input = [1, 2, 3, 4, 5, 6];
$result = sumOddNumbers($input);
echo $result; // Kết quả:
print_r("<br>");

function sumSquareOfEvenNumbers($arr) {
    $evenArray = filterEvenNumbers($arr);
    $squareEvenArray = array_map(fn($value): int => $value**2, $evenArray);
    return sumArray($squareEvenArray);
}
// Sử dụng
$input = [1, 2, 3, 4, 5, 6];
$result = sumSquareOfEvenNumbers($input);
echo $result; // Kết quả: 56
