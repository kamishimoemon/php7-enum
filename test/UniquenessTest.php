<?php

declare(strict_types=1);

namespace PHP\Test;

final class UniquenessTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumClassesAndName
	 */
	public function test_same_name_should_return_always_the_same_instance (string $class, string $name): void
	{
		$this->assertSame($class::$name(), $class::$name(), "{$class}::{$name}() should return the same instance every time");
	}

	/**
	 * @dataProvider enumClassesAndName
	 */
	public function test_valueOf_should_return_the_same_instance_for_the_same_name (string $class, string $name): void
	{
		$this->assertSame($class::valueOf($name), $class::valueOf($name), "{$class}::valueOf('{$name}') should return the same instance for the same name");
	}
}
