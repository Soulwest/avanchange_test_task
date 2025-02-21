<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__. '/../src/functions.php';

class FunctionsTest extends TestCase
{
	public function testProcessStringsReversesAndReplacesVowels(): void
	{
		$input = ['hello', 'world'];
		$expected = ['*ll*h', 'dlr*w'];
		$this->assertEquals($expected, process_strings($input));
	}

	public function testProcessStringsReversesAndReplacesVowels2(): void
	{
		$input = ['ooo', 'bbb'];
		$expected = ['***', 'bbb'];
		$this->assertEquals($expected, process_strings($input));
	}

	public function testProcessStringsHandlesEmptyArray(): void
	{
		$input = [];
		$expected = [];
		$this->assertEquals($expected, process_strings($input));
	}

	public function testSortObjectsSortsByKey(): void
	{
		$input = [
			['name' => 'John', 'age' => 30],
			['name' => 'Jane', 'age' => 25],
			['name' => 'Doe', 'age' => 35]
		];
		$expected = [
			['name' => 'Doe', 'age' => 35],
			['name' => 'John', 'age' => 30],
			['name' => 'Jane', 'age' => 25],
		];
		$this->assertEquals($expected, sort_objects($input, 'age'));
	}

	public function testSortObjectsSortsByKey2(): void
	{
		$input = [
			['name' => 'John', 'age' => 30],
			['name' => 'Jane', 'dick' => 25],
			['name' => 'Doe', 'age' => 35]
		];
		$expected = [
			['name' => 'Doe', 'age' => 35],
			['name' => 'John', 'age' => 30],
			['name' => 'Jane', 'dick' => 25],
		];
		$this->assertEquals($expected, sort_objects($input, 'age'));
	}

	public function testSortObjectsHandlesEmptyArray(): void
	{
		$input = [];
		$expected = [];
		$this->assertEquals($expected, sort_objects($input, 'age'));
	}

	public function testFlattenArrayFlattensNestedArrays(): void
	{
		$input = [1, [2, 3], [4, [5, 6]]];
		$expected = [1, 2, 3, 4, 5, 6];
		$this->assertEquals($expected, flatten_array($input));
	}

	public function testFlattenArrayFlattensNestedArraysAssoc(): void
	{
		// accos keys will go to the end of array
		$input = [1, ['two' => 'aa', 2, 3, ['one'=>'7']], [4, [5, 6]]];
		$expected = [1, 2, 3, 4, 5, 6, 'two' => 'aa', 'one'=>'7'];
		$this->assertEquals($expected, flatten_array($input));
	}

	public function testFlattenArrayHandlesEmptyArray(): void
	{
		$input = [];
		$expected = [];
		$this->assertEquals($expected, flatten_array($input));
	}

	public function testGetPermutationAtIndexReturnsCorrectPermutation(): void
	{
		$this->assertEquals('acb', get_permutation_at_index('abc', 2));
	}

	public function testGetPermutationAtIndexHandlesSingleCharacter(): void
	{
		$this->assertEquals('a', get_permutation_at_index('a', 1));
	}

	public function testGetPermutationAtIndexHandlesSingleCharacter2(): void
	{
		$this->assertEquals('', get_permutation_at_index('a', 2));
	}
}
