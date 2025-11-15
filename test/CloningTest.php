<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class CloningTest extends TestCase
{
	public function test_should_throw_when_cloned (): void
	{
		$this->expectException(\LogicException::class);
		$clone = clone Color::RED();
	}
}
