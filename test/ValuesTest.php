<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;
use ReflectionClass;

final class ValuesTest extends TestCase
{
	/**
	 * @dataProvider enumClassAndValuesProvider
	 */
	public function test_color_should_return_all_defined_instances (string $enumClass, int $size, array $enumValues): void
	{
		$values = $enumClass::values();

		$this->assertCount($size, $values);

		foreach ($enumValues as $value) {
			$this->assertContains($value, $values);
		}
	}

	public function enumClassAndValuesProvider (): array
	{
		return [
			'Color'  => [Color::class, 2, [Color::RED(), Color::BLUE()]],
			'ExtendedColor' => [ExtendedColor::class, 3, [Color::RED(), Color::BLUE(), ExtendedColor::GREEN()]],
		];
	}

	/**
	 * @dataProvider enumClassProvider
	 */
	public function test_values_should_not_contain_duplicates (string $enumClass): void
	{
		$values = $enumClass::values();
		$unique = array_unique(array_map('spl_object_hash', $values));

		$this->assertSame(count($values), count($unique), "{$enumClass}::values() must not contain duplicate instances.");
	}

	/**
	 * @dataProvider enumClassProvider
	 */
	public function test_values_should_match_all_methods_marked_as_value (string $enumClass): void
	{
		$reflection = new ReflectionClass($enumClass);

		$expectedInstances = [];

		foreach ($reflection->getMethods(\ReflectionMethod::IS_STATIC) as $method) {
			$doc = $method->getDocComment();
			if ($doc && strpos($doc, '@PHP\EnumValue') !== false) {
				$expectedInstances[] = $method->invoke(null);
			}
		}

		$actualInstances = $enumClass::values();

		$this->assertEqualsCanonicalizing(
			array_map('spl_object_hash', $expectedInstances),
			array_map('spl_object_hash', $actualInstances),
			'Enum::values() must contain exactly the instances marked with @PHP\EnumValue.'
		);
	}

	public function enumClassProvider (): array
	{
		return [
			'Color'  => [Color::class],
			'ExtendedColor' => [ExtendedColor::class],
		];
	}
}
