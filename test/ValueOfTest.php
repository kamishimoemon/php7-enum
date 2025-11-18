<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class ValueOfTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumClassAndNamesProvider
	 */
	public function test_should_return_instance_by_name (string $enumClass, string $enumName, Enumeration $enumValue): void
	{
		$instance = $enumClass::valueOf($enumName);

		$this->assertSame($enumValue, $instance, "{$enumClass}::valueOf('{$enumName}') must return {$enumValue->id()}");
	}

	public function enumClassAndNamesProvider (): array
	{
		return [
			'Color::RED()'  => [Color::class, 'RED', Color::RED()],
			'Color::BLUE()'  => [Color::class, 'BLUE', Color::BLUE()],
			'ExtendedColor::RED()' => [ExtendedColor::class, 'RED', Color::RED()],
			'ExtendedColor::BLUE()' => [ExtendedColor::class, 'BLUE', Color::BLUE()],
			'ExtendedColor::GREEN()' => [ExtendedColor::class, 'GREEN', ExtendedColor::GREEN()],
		];
	}

	/**
	 * @dataProvider enumerationClasses
	 */
	public function test_should_throw_if_name_does_not_exist (string $enumClass): void
	{
		$this->expectException(\InvalidArgumentException::class);
		$enumClass::valueOf("NOT_A_COLOR");
	}
}
