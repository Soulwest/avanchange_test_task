<?php

include "functions.php";
/**
* Задание 1:
*
* Есть массив данных, нужно написать PHP функцию process_strings(); которая выдаст ожидаемый результат.
*
*/

$input = ["apple", "banana", "cherry"];
$result = process_strings($input);
// Ожидаемый результат: ["*lpp*", "*n*n*b", "yrr*hc"]
print_r($result);



/**
* Задание 2:
*
* Необходимо написать функцию сортировки данных на PHP для достижения ожидаемого результата, не используя стандартные функции сортировок и работы с массивами в PHP.
*
*/

const data = [
	["name" => "Elon", "dick" => 25],
	["name" => "Pusechka", "dick" => 57],
	["name" => "Snoop Dogg", "dick" => 18]
];
// const result = sort_objects(data, 'age'); // What?? const from a function call?? data['dick'] in array, but sorting by 'age' key?
define("result", sort_objects(data, 'dick')); // was 'age'

// Ожидаемый результат:
//const data = [ // result ???
//	["name" => "Pusechka", "age" => 57],
//	["name" => "Elon", "age" => 25],
//	["name" => "Snoop Dogg", "age" => 18]
//];
print_r(result);



/**
* Задание 3:
*
* Необходимо написать функцию на PHP, которая принимает вложенный массив (массив может содержать другие массивы) и возвращает его "плоскую" версию (т.е., без вложенности).
*
*/

$input = [1, [2, [3, 4], 5], 6];
$result = flatten_array($input);
// Ожидаемый результат: [1, 2, 3, 4, 5, 6]

print_r($result);



/**
* Задание 4:
*
* Написать функцию на PHP, которая принимает строку и создает из нее все возможные уникальные перестановки (пермутации). После этого необходимо найти и вернуть по номеру (индексу) конкретную перестановку, при этом все перестановки не нужно сохранять в памяти.
*
* – Функция принимает: исходную строку и индекс перестановки.
* – Индексация должна начинаться с 1.
*
*/

$input = "abc";
$index = 4;
$result = get_permutation_at_index($input, $index);

// Ожидаемый результат: "bca"
print_r($result);
