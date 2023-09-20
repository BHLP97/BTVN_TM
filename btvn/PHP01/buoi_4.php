<?php
function reverseString($str) {
    $arrayWords = explode(" ", $str);
    $newArray = [];
    foreach ($arrayWords as $val) {
        $newWord = strrev($val);
        array_unshift($newArray, $newWord);
    }
    return implode(" ", $newArray);
}
// Sử dụng
$input = "Hello World";
$result = reverseString($input);
echo $result; // Kết quả: "dlroW olleH"
print_r("<br>");

function countWords($str) {
    return (count(explode(" ", $str)));
}
// Sử dụng
$input = "This is a sample string";
$result = countWords($input);
echo $result; // Kết quả: 5
print_r("<br>");

function removeDuplicates($arr) {
    return array_unique($arr);
}
// Sử dụng
$input = [1, 2, 2, 3, 4, 4, 5];
$result = removeDuplicates($input);
print_r($result); // Kết quả: [1, 2, 3, 4, 5]
print_r("<br>");

function isAscendingArray($arr) {
    for($i=0; $i<count($arr)-1; $i++) {
        if($arr[$i] > $arr[$i+1]) return false;
    }
    return true;
}
// Sử dụng
$input = [1, 3, 5, 7, 9];
$result = isAscendingArray($input);
var_dump($result); // Kết quả: true
print_r("<br>");

function reverseWordsInString($str) {
    $arrayWords = explode(" ", $str);
    $newArray = [];
    foreach ($arrayWords as $val) {
        $newWord = strrev($val);
        array_push($newArray, $newWord);
    }
    return implode(" ", $newArray);
}
// Sử dụng
$input = "Hello World";
$result = reverseWordsInString($input);
echo $result; // Kết quả: "olleH dlroW"
print_r("<br>");

function findSecondLargest($arr) {
    arsort($arr);
    $orderedArray = [];
    foreach ($arr as $val){
        array_push($orderedArray, $val);
    }
    return $orderedArray[1];// Viết code
}
// Sử dụng
$input = [5, 2, 9, 1, 7, 3];
$result = findSecondLargest($input);
echo $result; // Kết quả: 7
print_r("<br>");

function findPairsWithSum($arr, $sum) {
    $k = 0;
    $n = count($arr);
    $newArray = [];
    while ($k != $n){
        for($i=$k; $i<$n-1; $i++) {
            if($arr[$k] + $arr[$k+($n-$i)-1] == $sum) array_push($newArray, [$arr[$k], $arr[$k+($n-$i)-1]], [$arr[$k+($n-$i)-1], $arr[$k]]);
            print_r("<br>");
        }
        $k += 1;
    }
    return $newArray;
}
// Sử dụng
$input = [2, 4, 3, 5, 6, 1, 7];
$targetSum = 7;
$result = findPairsWithSum($input, $targetSum);
print_r($result); // Kết quả: [[2, 5], [4, 3], [3, 4], [5, 2], [6, 1], [1, 6]]

function findMostFrequentElement($arr) {
    $newArray = [];
    for($i=0; $i<count($arr); $i++) {

    }
}
// Sử dụng
$input = [1, 2, 2, 3, 3, 3, 4, 4, 4, 4];
$result = findMostFrequentElement($input);
echo $result; // Kết quả: 4
