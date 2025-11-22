<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;

final class CloningTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumValues
	 */
	public function test_should_throw_when_cloned (Enumeration $value): void
	{
		$this->expectException(\LogicException::class);
		clone $value;
	}
}
