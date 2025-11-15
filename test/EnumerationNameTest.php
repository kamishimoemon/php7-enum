<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class EnumerationNameTest extends TestCase
{
	public function test_should_return_raw_name (): void
	{
		$this->assertSame('RED', Color::RED()->name());
		$this->assertSame('BLUE', Color::BLUE()->name());
	}
}
