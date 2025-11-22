<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;

use function serialize;

final class SerializationTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumValues
	 */
	public function test_should_throw_when_serialized (Enumeration $value): void
	{
		$this->expectException(\LogicException::class);
		serialize($value);
	}
}
