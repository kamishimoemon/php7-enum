<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class CastingToStringTest extends DataProviderTestCase
{
	public function test_casting_to_string_should_return_name_by_default (): void
	{
		$this->assertSame('RED', (string) Color::RED());
		$this->assertSame('BLUE', (string) Color::BLUE());
		$this->assertSame('GREEN', (string) ExtendedColor::GREEN());
	}
}
