<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;
use ReflectionClass;

final class ConstructionTest extends TestCase
{
	public function test_should_not_allow_for_manual_instantiation (): void
	{
		$this->expectException(\Error::class);
		new Color("some color");
	}
}
