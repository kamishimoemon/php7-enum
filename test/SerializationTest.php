<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

use function serialize;
use function unserialize;

final class SerializationTest extends TestCase
{
	public function test_should_throw_when_serialized (): void
	{
		$this->expectException(\LogicException::class);
		serialize(Color::RED());
	}
}
