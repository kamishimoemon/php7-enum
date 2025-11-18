<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

use function serialize;

final class SerializationTest extends DataProviderTestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function test_should_throw_when_serialized (Enumeration $value): void
	{
		$this->expectException(\LogicException::class);
		serialize($value);
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
