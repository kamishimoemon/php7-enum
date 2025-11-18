<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class ConstructionTest extends DataProviderTestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function test_should_not_allow_for_manual_instantiation (string $enumClass): void
	{
		$this->expectException(\Error::class);
		new $enumClass("some name");
	}

	public function dataProvider (): array
	{
		return [
			'Color'  => [Color::class],
			'ExtendedColor' => [ExtendedColor::class],
		];
	}
}
