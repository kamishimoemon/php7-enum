<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class EnumerationEqualsTest extends TestCase
{
	public function test_should_return_true_for_same_instance (): void
	{
		$this->assertTrue(Color::RED()->equals(Color::RED()));
	}

	public function test_should_return_false_for_different_instances (): void
	{
		$this->assertFalse(Color::RED()->equals(Color::BLUE()));
	}
}
