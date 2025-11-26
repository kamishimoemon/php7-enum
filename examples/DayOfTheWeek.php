<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\Enum;

/**
 * Example of an enum with custom (abstract) methods.
 * It must extends PHP\CustomEnum.
 * CustomEnum classes define their instances in 2 ways:
 * - As a private static method whose return type is self or the same class
 * - As a protected static final method whose return type is self or the same class
 * In both cases, the method's name becomes the instance's name.
 */
abstract class DayOfTheWeek extends Enum
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
