<?php

declare(strict_types=1);

namespace PHP\Test;

final class ConstructionTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumerationClasses
	 */
	public function test_should_not_allow_for_manual_instantiation (string $enumClass): void
	{
		$this->expectException(\Error::class);
		new $enumClass("some name");
	}
}
