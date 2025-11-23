<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\DayOfTheWeek;

final class SwitchTest extends TestCase
{
	/**
	 * @dataProvider allDaysOfTheWeek
	 */
	public function test_enum_values_should_work_as_switch_cases (DayOfTheWeek $day, TellItLikeItIs $tell): void
	{
		switch ($day) {
			case DayOfTheWeek::MONDAY():
				$tell->mondaysAreBad();
			break;
			case DayOfTheWeek::FRIDAY():
				$tell->fridaysAreBetter();
			break;
			case DayOfTheWeek::SATURDAY():
			case DayOfTheWeek::SUNDAY():
				$tell->weekendsAreBest();
			default:
				$tell->midweekDaysAreSoSo();
		}
	}

	public function allDaysOfTheWeek (): array
	{
		$tellWeekend = $this->createMock(TellItLikeItIs::class);
		$tellWeekend->expects($this->atMost(2))->method('weekendsAreBest');

		$tellFriday = $this->createMock(TellItLikeItIs::class);
		$tellFriday->expects($this->once())->method('fridaysAreBetter');

		$tellMonday = $this->createMock(TellItLikeItIs::class);
		$tellMonday->expects($this->once())->method('mondaysAreBad');

		$tellMidweek = $this->createMock(TellItLikeItIs::class);
		$tellMidweek->expects($this->atMost(3))->method('midweekDaysAreSoSo');

		return [
			'DayOfTheWeek::SUNDAY' => [DayOfTheWeek::SUNDAY(), $tellWeekend],
			'DayOfTheWeek::MONDAY' => [DayOfTheWeek::MONDAY(), $tellMonday],
			'DayOfTheWeek::TUESDAY' => [DayOfTheWeek::TUESDAY(), $tellMidweek],
			'DayOfTheWeek::WEDNESDAY' => [DayOfTheWeek::WEDNESDAY(), $tellMidweek],
			'DayOfTheWeek::THURSDAY' => [DayOfTheWeek::THURSDAY(), $tellMidweek],
			'DayOfTheWeek::FRIDAY' => [DayOfTheWeek::FRIDAY(), $tellFriday],
			'DayOfTheWeek::SATURDAY' => [DayOfTheWeek::SATURDAY(), $tellWeekend],
		];
	}
}

interface TellItLikeItIs {
	function mondaysAreBad (): void;
	function fridaysAreBetter (): void;
	function weekendsAreBest (): void;
	function midweekDaysAreSoSo (): void;
}
