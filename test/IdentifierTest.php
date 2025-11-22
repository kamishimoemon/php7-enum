<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;

final class IdentifierTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumValuesAndID
	 */
	public function test_should_return_fully_qualified_id (Enumeration $value, string $id): void
	{
		$this->assertSame($id, $value->id());
	}
}
