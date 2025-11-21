<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class SubclassingTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumValuesAndClass
	 */
	public function test_should_support_enum_extension (Enumeration $value, string $class): void
	{
		$this->assertInstanceOf($class, $value);
	}

	public function enumValuesAndClass (): array
	{
		return [
			'Color::RED()'  => [Color::RED(), Color::class],
			'Color::BLUE()' => [Color::BLUE(), Color::class],
			'ExtendedColor::RED()' => [ExtendedColor::RED(), Color::class],
			'ExtendedColor::BLUE()' => [ExtendedColor::BLUE(), Color::class],
			'ExtendedColor::GREEN()' => [ExtendedColor::GREEN(), ExtendedColor::class],
		];
	}

	/**
	 * @dataProvider sameValuesFromDifferentClasses
	 */
	public function test_enum_values_from_subclasses_should_be_same_as_parent_class (Enumeration $value1, Enumeration $value2): void
	{
		$this->assertSame($value1, $value2);
	}

	public function sameValuesFromDifferentClasses (): array
	{
		return [
			'red'  => [Color::RED(), ExtendedColor::RED()],
			'blue' => [Color::BLUE(), ExtendedColor::BLUE()],
		];
	}
}
