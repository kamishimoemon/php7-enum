<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Enumeration;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class UniquenessTest extends TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function test_it_returns_the_same_instance_for_the_same_value (Enumeration $value1, Enumeration $value2): void
	{
		$this->assertSame($value1, $value2, 'Enum should return the same instance for the same value');
	}

	public function dataProvider (): array
	{
		return [
			'red'  => [Color::RED(), Color::RED()],
			'blue' => [Color::BLUE(), Color::BLUE()],
			'green' => [ExtendedColor::GREEN(), ExtendedColor::GREEN()],
		];
	}
}
