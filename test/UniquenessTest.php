<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class UniquenessTest extends TestCase
{
	public function test_it_returns_the_same_instance_for_the_same_value (): void
	{
		$red1 = Color::RED();
		$red2 = Color::RED();

		$this->assertSame($red1, $red2, 'Enum should return the same instance for the same value');
	}
}
