<?php

/**
 * @param string[] $input
 * @return string[]
 */
function process_strings(array $input): array
{
	return array_map(static function (string $word) {
		// Reverse the word
		$reversed = strrev($word);

		// Replace vowels with * (advanced, but not efficient way)
		//return preg_replace('/[aeiou]/i', '*', $reversed);

		// Replace vowels with * (efficient way)
		return str_ireplace(['a', 'e', 'i', 'o', 'u'], '*', $reversed);
	}, $input);
}

function sort_objects(array $arr, string $key): array
{
	// No bubble sort, because O(n^2) difficult
	// Making quicksort with  O(n log n) difficult

	if (count($arr) < 2)
	{
		return $arr; // porque array already sorted
	}

	$pivot = $arr[0]; // base element
	$left = $right = [];

	for ($i = 1, $n = count($arr); $i < $n; $i++)
	{
		// Check if key exists in arrays
		$currentValue = $arr[$i][$key] ?? NULL;
		$pivotValue = $pivot[$key] ?? NULL;

		if ($currentValue !== NULL
			&& $pivotValue !== NULL
			&& $currentValue >= $pivotValue
		)
		{
			$left[] = $arr[$i];
		}
		else
		{
			$right[] = $arr[$i];
		}
	}

	return array_merge(sort_objects($left, $key), [$pivot], sort_objects($right, $key));
}

function flatten_array(array $array): array
{
	// Keys of the array
	$keys = array_keys($array);
	// If the array keys of the keys match the keys, then the array must not be associative
	$is_assoc = array_keys($keys) !== $keys;

	$flat = [];
	foreach ($array as $key => $value)
	{
		if (is_array($value))
		{
			$flat = [...$flat, ...flatten_array($value)];
		}
		else if ($is_assoc)
		{
			$flat[$key] = $value;
		}
		else
		{
			$flat[] = $value;
		}
	}

	return $flat;
}

function get_permutation_at_index(string $str, int $index): string
{
	$chars = str_split($str);
	sort($chars);
	$index--; // Index as 0-based system
	$n = count($chars);
	$result = "";
	$used = array_fill(0, $n, FALSE);

	// Вычисляем факториалы заранее
	$factorial = [1];
	for ($i = 1; $i < $n; $i++)
	{
		$factorial[$i] = $factorial[$i - 1] * $i;
	}

	for ($i = 0; $i < $n; $i++)
	{
		$fact = $factorial[$n - $i - 1];
		$pos = intdiv($index, $fact); // Get the position in the avaliable characters
		$index %= $fact; // Renew index for the next iteration

		// Находим pos-ый неиспользованный символ
		$count = -1;
		for ($j = 0; $j < $n; $j++)
		{
			if ($used[$j])
			{
				continue;
			}

			$count++;

			if ($count !== $pos)
			{
				continue;
			}

			$result .= $chars[$j];
			$used[$j] = TRUE;
			break;
		}
	}

	return $result;
}
