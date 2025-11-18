<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

use function PHP\enumval;

final class CastingToEnumValueTest extends DataProviderTestCase
{
	/**
	 * @dataProvider dataProvider
	 */
	public function test_should_restore_enum_from_id (Enumeration $enumValue, string $enumId): void
	{
		$value = enumval($enumId);
		$this->assertSame($enumValue, $value);
	}

	public function test_should_fail_when_id_is_invalid (): void
	{
		$this->expectException(\InvalidArgumentException::class);
		enumval('PHP.Examples.Color.PURPLE');
	}

	public function dataProvider (): array
	{
		return [
			'red'  => [Color::RED(), Color::RED()->id()],
			'blue' => [Color::BLUE(), Color::BLUE()->id()],
			'green' => [ExtendedColor::GREEN(), ExtendedColor::GREEN()->id()],
		];
	}
}
