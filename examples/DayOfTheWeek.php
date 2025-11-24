<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\CustomEnum;

abstract class DayOfTheWeek extends CustomEnum
{
	protected static final function SUNDAY (): self
	{
		return new class extends DayOfTheWeek {
			public function tellItLikeItIs (): string {
				return 'Weekends are best.';
			}
		};
	}

	protected static final function MONDAY (): self
	{
		return new class extends DayOfTheWeek {
			public function tellItLikeItIs (): string {
				return 'Mondays are bad.';
			}
		};
	}

	protected static final function TUESDAY (): self
	{
		return new class extends DayOfTheWeek {
			public function tellItLikeItIs (): string {
				return 'Midweek days are so-so.';
			}
		};
	}

	protected static final function WEDNESDAY (): self
	{
		return new class extends DayOfTheWeek {
			public function tellItLikeItIs (): string {
				return 'Midweek days are so-so.';
			}
		};
	}

	protected static final function THURSDAY (): self
	{
		return new class extends DayOfTheWeek {
			public function tellItLikeItIs (): string {
				return 'Midweek days are so-so.';
			}
		};
	}

	protected static final function FRIDAY (): self
	{
		return new class extends DayOfTheWeek {
			public function tellItLikeItIs (): string {
				return 'Fridays are better.';
			}
		};
	}

	protected static final function SATURDAY (): self
	{
		return new class extends DayOfTheWeek {
			public function tellItLikeItIs (): string {
				return 'Weekends are best.';
			}
		};
	}

	public abstract function tellItLikeItIs (): string;

	public static final function main (): void
	{
		foreach (self::values() as $dayOfTheWeek)
		{
			echo "{$dayOfTheWeek}, please tell us like it is: {$dayOfTheWeek->tellItLikeItIs()}" . PHP_EOL;
		}
	}
}
