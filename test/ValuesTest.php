<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;
use ReflectionClass;

final class ValuesTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumClassAndValuesProvider
	 */
	public function test_color_should_return_all_defined_instances (string $enumClass, array $enumValues): void
	{
		$values = $enumClass::values();

		$this->assertCount(count($enumValues), $values);

		foreach ($enumValues as $value) {
			$this->assertContains($value, $values);
		}
	}

	/**
	 * @dataProvider enumerationClasses
	 */
	public function test_values_should_not_contain_duplicates (string $enumClass): void
	{
		$values = $enumClass::values();
		$unique = array_unique(array_map('spl_object_hash', $values));

		$this->assertSame(count($values), count($unique), "{$enumClass}::values() must not contain duplicate instances.");
	}

	/**
	 * @dataProvider enumClassAndValuesProvider
	 */
	public function test_values_should_match_all_methods_marked_as_value (string $enumClass, array $expectedInstances): void
	{
		$actualInstances = $enumClass::values();

		$this->assertEqualsCanonicalizing(
			array_map('spl_object_hash', $expectedInstances),
			array_map('spl_object_hash', $actualInstances),
			'Enum::values() must contain exactly the instances marked with @PHP\EnumValue.'
		);
	}

	public function enumClassAndValuesProvider (): array
	{
		return [
			'Color'  => [Color::class, [Color::RED(), Color::BLUE()]],
			'ExtendedColor' => [ExtendedColor::class, [ExtendedColor::RED(), ExtendedColor::BLUE(), ExtendedColor::GREEN()]],
		];
	}
}
