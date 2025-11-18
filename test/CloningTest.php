<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class CloningTest extends DataProviderTestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function test_should_throw_when_cloned (Enumeration $value): void
	{
		$this->expectException(\LogicException::class);
		clone $value;
	}

	public function dataProvider (): array
	{
		return [
			'red'  => [Color::RED()],
			'blue' => [Color::BLUE()],
			'green' => [ExtendedColor::GREEN()],
		];
	}
}
