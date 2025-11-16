<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class CustomPropertiesTest extends TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function test_should_return_hex_code (Color $color, string $hex): void
	{
		$this->assertSame($hex, $color->hex());
	}

	public function dataProvider (): array
	{
		return [
			'red'  => [Color::RED(), '#FF0000'],
			'blue' => [Color::BLUE(), '#0000FF'],
			'green' => [ExtendedColor::GREEN(), '#00FF00'],
		];
	}
}
