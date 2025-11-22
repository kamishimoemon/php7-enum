<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class CustomPropertiesTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumValuesWithCustomProperties
	 */
	public function test_should_return_hex_code (Color $color, string $hex): void
	{
		$this->assertSame($hex, $color->hex());
	}

	public function enumValuesWithCustomProperties (): array
	{
		return [
			'red'  => [Color::RED(), '#FF0000'],
			'blue' => [Color::BLUE(), '#0000FF'],
			'green' => [ExtendedColor::GREEN(), '#00FF00'],
		];
	}
}
