<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class AbstractMethodsTest extends TestCase
{
	public function test_should_define_behavior_per_instance (): void
	{
		$this->assertTrue(Color::RED()->isWarm());
		$this->assertFalse(Color::BLUE()->isWarm());
	}
}
