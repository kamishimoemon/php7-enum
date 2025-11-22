<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;
use PHP\Examples\Job;
use PHP\Examples\FirstJob;
use PHP\Examples\SecondJob;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class SubclassingTest extends DataProviderTestCase
{
	/**
	 * @dataProvider enumValuesAndClass
	 */
	public function test_should_support_enum_extension (Enumeration $value, string $class): void
	{
		$this->assertInstanceOf($class, $value);
	}

	/**
	 * @dataProvider sameValuesFromDifferentClasses
	 */
	public function test_enum_values_from_subclasses_should_be_same_as_parent_class (Enumeration $value1, Enumeration $value2): void
	{
		$this->assertSame($value1, $value2);
	}

	public function sameValuesFromDifferentClasses (): array
	{
		return [
			'Job|FirstJob::NOVICE()' => [Job::NOVICE(), FirstJob::NOVICE()],
			'Job|SecondJob::NOVICE()' => [Job::NOVICE(), SecondJob::NOVICE()],
			'FirstJob|SecondJob::NOVICE()' => [FirstJob::NOVICE(), SecondJob::NOVICE()],
			'Color|ExtendedColor::RED()'  => [Color::RED(), ExtendedColor::RED()],
			'Color|ExtendedColor::BLUE()' => [Color::BLUE(), ExtendedColor::BLUE()],
		];
	}
}
