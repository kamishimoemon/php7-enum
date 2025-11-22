<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;

final class ValueOfTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumClassesAndName
	 */
	public function test_should_return_same_instance_by_name (string $enumClass, string $enumName): void
	{
		$value1 = $enumClass::valueOf($enumName);
		$value2 = $enumClass::$enumName();

		$this->assertTrue($value1 === $value2, "{$enumClass}::valueOf('{$enumName}') must return the same instance as {$enumClass}::{$enumName}()");
	}

	/**
	 * @dataProvider enumerationClasses
	 */
	public function test_should_throw_if_name_does_not_exist (string $enumClass): void
	{
		$this->expectException(\InvalidArgumentException::class);
		$enumClass::valueOf("NOT_A_COLOR");
	}
}
