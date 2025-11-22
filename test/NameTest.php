<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;

final class NameTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumValuesAndName
	 */
	public function test_should_return_raw_name (Enumeration $value, string $name): void
	{
		$this->assertSame($name, $value->name());
	}
}
