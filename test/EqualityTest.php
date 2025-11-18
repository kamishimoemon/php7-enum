<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class EqualityTest extends DataProviderTestCase
{
	public function test_should_return_true_for_same_instance (): void
	{
		$this->assertTrue(Color::RED()->equals(Color::RED()));
		$this->assertTrue(Color::BLUE()->equals(Color::BLUE()));
		$this->assertTrue(ExtendedColor::GREEN()->equals(ExtendedColor::GREEN()));
	}

	public function test_should_return_false_for_different_instances (): void
	{
		$this->assertFalse(Color::RED()->equals(Color::BLUE()));
		$this->assertFalse(Color::RED()->equals(ExtendedColor::GREEN()));
		$this->assertFalse(Color::BLUE()->equals(Color::RED()));
		$this->assertFalse(Color::BLUE()->equals(ExtendedColor::GREEN()));
		$this->assertFalse(ExtendedColor::GREEN()->equals(Color::RED()));
		$this->assertFalse(ExtendedColor::GREEN()->equals(Color::BLUE()));
	}
}
