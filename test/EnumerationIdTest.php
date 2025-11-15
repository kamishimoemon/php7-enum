<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class EnumerationIdTest extends TestCase
{
	public function test_should_return_fully_qualified_id (): void
	{
		$this->assertSame('PHP.Examples.Color.RED', Color::RED()->id());
		$this->assertSame('PHP.Examples.Color.BLUE', Color::BLUE()->id());
	}
}
