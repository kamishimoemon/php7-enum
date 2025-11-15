<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class EnumerationToStringTest extends TestCase
{
	public function test_casting_to_string_should_return_name_by_default (): void
	{
		$this->assertSame('RED', (string) Color::RED());
		$this->assertSame('BLUE', (string) Color::BLUE());
	}
}
