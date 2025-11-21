<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Examples\DayOfTheWeek;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;
use ReflectionClass;

final class ValuesTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumClassesAndValues
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
	 * @todo see if this is equivalent to test_color_should_return_all_defined_instances
	 * @dataProvider enumClassesAndValues
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

	public function enumClassesAndValues (): array
	{
		return [
			'DayOfTheWeek'  => [DayOfTheWeek::class, [DayOfTheWeek::SUNDAY(), DayOfTheWeek::MONDAY(), DayOfTheWeek::TUESDAY(), DayOfTheWeek::WEDNESDAY(), DayOfTheWeek::THURSDAY(), DayOfTheWeek::FRIDAY(), DayOfTheWeek::SATURDAY()]],
			'Color'  => [Color::class, [Color::RED(), Color::BLUE()]],
			'ExtendedColor' => [ExtendedColor::class, [ExtendedColor::RED(), ExtendedColor::BLUE(), ExtendedColor::GREEN()]],
		];
	}
}
