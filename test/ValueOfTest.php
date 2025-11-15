<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class ValueOfTest extends TestCase
{
	public function test_should_return_instance_by_name (): void
	{
		$color = Color::valueOf("RED");

		$this->assertSame(Color::RED(), $color, 'valueOf("RED") must return Color::RED()');
	}

	public function test_should_throw_if_name_does_not_exist (): void
	{
		$this->expectException(\InvalidArgumentException::class);

		Color::valueOf("NOT_A_COLOR");
	}
}
