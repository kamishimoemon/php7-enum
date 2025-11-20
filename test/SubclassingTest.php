<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class SubclassingTest extends DataProviderTestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function test_should_support_enum_extension (Enumeration $value, string $class): void
	{
		$this->assertInstanceOf($class, $value);
	}

	public function dataProvider (): array
	{
		return [
			'red'  => [Color::RED(), Color::class],
			'blue' => [Color::BLUE(), Color::class],
			'green' => [ExtendedColor::GREEN(), ExtendedColor::class],
		];
	}

	// @todo: add test Color::RED() === ExtendedColor::RED().
}
