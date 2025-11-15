<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;
use ReflectionClass;

final class ValuesTest extends TestCase
{
	public function test_should_return_all_defined_instances (): void
	{
		$values = Color::values();

		$this->assertCount(2, $values);
		$this->assertSame(Color::RED(), $values[0]);
		$this->assertSame(Color::BLUE(), $values[1]);
	}

	public function test_values_should_not_contain_duplicates (): void
	{
		$values = Color::values();
		$unique = array_unique(array_map('spl_object_hash', $values));

		$this->assertSame(count($values), count($unique), 'Enum::values() must not contain duplicate instances.');
	}

	public function test_values_should_match_all_methods_marked_as_value (): void
	{
		$reflection = new ReflectionClass(Color::class);

		$expectedInstances = [];

		foreach ($reflection->getMethods(\ReflectionMethod::IS_STATIC) as $method) {
			$doc = $method->getDocComment();
			if ($doc && strpos($doc, '@Value') !== false) {
				$expectedInstances[] = $method->invoke(null);
			}
		}

		$actualInstances = Color::values();

		$this->assertEqualsCanonicalizing(
			array_map('spl_object_hash', $expectedInstances),
			array_map('spl_object_hash', $actualInstances),
			'Enum::values() must contain exactly the instances marked with @Value.'
		);
	}
}
