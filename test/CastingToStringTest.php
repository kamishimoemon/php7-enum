<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;

final class CastingToStringTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumValuesAndName
	 */
	public function test_casting_to_string_should_return_name_by_default (Enumeration $value, string $name): void
	{
		$this->assertEquals($name, strval($value));
	}
}
