<?php

declare(strict_types=1);

namespace PHP\Test;

final class OrdinalityTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumClassesAndValues
	 */
	public function test_values_ordinality_should_match_its_declaration_order (string $enumClass, array $enumValues): void
	{
		$values = $enumClass::values();

		foreach ($enumValues as $ordinality => $value) {
			$this->assertSame($value, $values[$ordinality]);
		}
	}
}
