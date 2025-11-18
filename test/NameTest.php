<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class NameTest extends DataProviderTestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function test_should_return_raw_name (Enumeration $value, string $name): void
	{
		$this->assertSame($name, $value->name());
	}

	public function dataProvider (): array
	{
		return [
			'red'  => [Color::RED(), 'RED'],
			'blue' => [Color::BLUE(), 'BLUE'],
			'green' => [ExtendedColor::GREEN(), 'GREEN'],
		];
	}
}
