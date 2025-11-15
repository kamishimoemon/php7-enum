<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class EnumerationValuesTest extends TestCase
{
	public function test_should_return_all_defined_instances (): void
	{
		$values = Color::values();

		$this->assertCount(2, $values);
		$this->assertSame(Color::RED(), $values[0]);
		$this->assertSame(Color::BLUE(), $values[1]);
	}
}
