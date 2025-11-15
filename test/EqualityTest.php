<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class EqualityTest extends TestCase
{
	public function test_should_return_true_for_same_instance (): void
	{
		$this->assertTrue(Color::RED()->equals(Color::RED()));
		$this->assertTrue(Color::BLUE()->equals(Color::BLUE()));
	}

	public function test_should_return_false_for_different_instances (): void
	{
		$this->assertFalse(Color::RED()->equals(Color::BLUE()));
		$this->assertFalse(Color::BLUE()->equals(Color::RED()));
	}
}
