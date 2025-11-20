<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\DayOfTheWeek;

class ValuesAsConstantsTest extends TestCase
{
	/**
	 * @dataProvider values
	 */
	public function test_enum_values_should_be_definable_as_constants (string $name): void
	{
		$day = DayOfTheWeek::$name();
		$this->assertInstanceOf(DayOfTheWeek::class, $day);
	}

	public function values (): array
	{
		return [
			'Sunday' => ['SUNDAY'],
			'Monday' => ['MONDAY'],
			'Tuesday' => ['TUESDAY'],
			'Wednesday' => ['WEDNESDAY'],
			'Thursday' => ['THURSDAY'],
			'Friday' => ['FRIDAY'],
			'Saturday' => ['SATURDAY'],
		];
	}
}
