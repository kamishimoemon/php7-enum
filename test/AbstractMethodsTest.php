<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class AbstractMethodsTest extends TestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function test_should_define_behavior_per_instance (Color $color, bool $isWarm): void
	{
		$this->assertEquals($color->isWarm(), $isWarm);
	}

	public function dataProvider (): array
	{
		return [
			'red'  => [Color::RED(), true],
			'blue' => [Color::BLUE(), false],
			'green' => [ExtendedColor::GREEN(), true],
		];
	}
}
