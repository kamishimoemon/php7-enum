<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\DayOfTheWeek;
use PHP\Examples\Job;
use PHP\Examples\FirstJob;
use PHP\Examples\SecondJob;
use PHP\Examples\Planet;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

abstract class DataProviderTestCase extends TestCase
{
	public function enumerationClasses (): array
	{
		return [
			'DayOfTheWeek'  => [DayOfTheWeek::class],
			'Job'  => [Job::class],
			'FirstJob'  => [FirstJob::class],
			'SecondJob'  => [SecondJob::class],
			'Planet'  => [Planet::class],
			'Color'  => [Color::class],
			'ExtendedColor' => [ExtendedColor::class],
		];
	}

	public function enumValues (): array
	{
		return [
			'DayOfTheWeek::SUNDAY'  => [DayOfTheWeek::SUNDAY()],
			'DayOfTheWeek::MONDAY'  => [DayOfTheWeek::MONDAY()],
			'DayOfTheWeek::TUESDAY'  => [DayOfTheWeek::TUESDAY()],
			'DayOfTheWeek::WEDNESDAY'  => [DayOfTheWeek::WEDNESDAY()],
			'DayOfTheWeek::THURSDAY'  => [DayOfTheWeek::THURSDAY()],
			'DayOfTheWeek::FRIDAY'  => [DayOfTheWeek::FRIDAY()],
			'DayOfTheWeek::SATURDAY'  => [DayOfTheWeek::SATURDAY()],
			'Job::NOVICE'  => [Job::NOVICE()],
			'FirstJob::SWORDMAN'  => [FirstJob::SWORDMAN()],
			'FirstJob::MAGE'  => [FirstJob::MAGE()],
			'FirstJob::MERCHANT'  => [FirstJob::MERCHANT()],
			'FirstJob::ACOLYTE'  => [FirstJob::ACOLYTE()],
			'FirstJob::THIEF'  => [FirstJob::THIEF()],
			'FirstJob::ARCHER'  => [FirstJob::ARCHER()],
			'SecondJob::KNIGHT'  => [SecondJob::KNIGHT()],
			'SecondJob::CRUSADER'  => [SecondJob::CRUSADER()],
			'SecondJob::WIZARD'  => [SecondJob::WIZARD()],
			'SecondJob::SAGE'  => [SecondJob::SAGE()],
			'SecondJob::BLACKSMITH'  => [SecondJob::BLACKSMITH()],
			'SecondJob::ALCHEMIST'  => [SecondJob::ALCHEMIST()],
			'SecondJob::PRIEST'  => [SecondJob::PRIEST()],
			'SecondJob::MONK'  => [SecondJob::MONK()],
			'SecondJob::ASSASSIN'  => [SecondJob::ASSASSIN()],
			'SecondJob::ROGUE'  => [SecondJob::ROGUE()],
			'SecondJob::HUNTER'  => [SecondJob::HUNTER()],
			'SecondJob::BARD'  => [SecondJob::BARD()],
			'SecondJob::DANCER'  => [SecondJob::DANCER()],
			'Planet::MERCURY'  => [Planet::MERCURY()],
			'Planet::VENUS'  => [Planet::VENUS()],
			'Planet::EARTH'  => [Planet::EARTH()],
			'Planet::MARS'  => [Planet::MARS()],
			'Planet::JUPITER'  => [Planet::JUPITER()],
			'Planet::SATURN'  => [Planet::SATURN()],
			'Planet::URANUS'  => [Planet::URANUS()],
			'Planet::NEPTUNE'  => [Planet::NEPTUNE()],
			'Color::RED'  => [Color::RED()],
			'Color::BLUE' => [Color::BLUE()],
			'ExtendedColor::GREEN' => [ExtendedColor::GREEN()],
		];
	}

	public function enumValuesAndID (): array
	{
		return [
			'DayOfTheWeek::SUNDAY'  => [DayOfTheWeek::SUNDAY(), 'PHP.Examples.DayOfTheWeek.SUNDAY'],
			'DayOfTheWeek::MONDAY'  => [DayOfTheWeek::MONDAY(), 'PHP.Examples.DayOfTheWeek.MONDAY'],
			'DayOfTheWeek::TUESDAY'  => [DayOfTheWeek::TUESDAY(), 'PHP.Examples.DayOfTheWeek.TUESDAY'],
			'DayOfTheWeek::WEDNESDAY'  => [DayOfTheWeek::WEDNESDAY(), 'PHP.Examples.DayOfTheWeek.WEDNESDAY'],
			'DayOfTheWeek::THURSDAY'  => [DayOfTheWeek::THURSDAY(), 'PHP.Examples.DayOfTheWeek.THURSDAY'],
			'DayOfTheWeek::FRIDAY'  => [DayOfTheWeek::FRIDAY(), 'PHP.Examples.DayOfTheWeek.FRIDAY'],
			'DayOfTheWeek::SATURDAY'  => [DayOfTheWeek::SATURDAY(), 'PHP.Examples.DayOfTheWeek.SATURDAY'],
			'Job::NOVICE'  => [Job::NOVICE(), 'PHP.Examples.Job.NOVICE'],
			'FirstJob::SWORDMAN'  => [FirstJob::SWORDMAN(), 'PHP.Examples.FirstJob.SWORDMAN'],
			'FirstJob::MAGE'  => [FirstJob::MAGE(), 'PHP.Examples.FirstJob.MAGE'],
			'FirstJob::MERCHANT'  => [FirstJob::MERCHANT(), 'PHP.Examples.FirstJob.MERCHANT'],
			'FirstJob::ACOLYTE'  => [FirstJob::ACOLYTE(), 'PHP.Examples.FirstJob.ACOLYTE'],
			'FirstJob::THIEF'  => [FirstJob::THIEF(), 'PHP.Examples.FirstJob.THIEF'],
			'FirstJob::ARCHER'  => [FirstJob::ARCHER(), 'PHP.Examples.FirstJob.ARCHER'],
			'SecondJob::KNIGHT'  => [SecondJob::KNIGHT(), 'PHP.Examples.SecondJob.KNIGHT'],
			'SecondJob::CRUSADER'  => [SecondJob::CRUSADER(), 'PHP.Examples.SecondJob.CRUSADER'],
			'SecondJob::WIZARD'  => [SecondJob::WIZARD(), 'PHP.Examples.SecondJob.WIZARD'],
			'SecondJob::SAGE'  => [SecondJob::SAGE(), 'PHP.Examples.SecondJob.SAGE'],
			'SecondJob::BLACKSMITH'  => [SecondJob::BLACKSMITH(), 'PHP.Examples.SecondJob.BLACKSMITH'],
			'SecondJob::ALCHEMIST'  => [SecondJob::ALCHEMIST(), 'PHP.Examples.SecondJob.ALCHEMIST'],
			'SecondJob::PRIEST'  => [SecondJob::PRIEST(), 'PHP.Examples.SecondJob.PRIEST'],
			'SecondJob::MONK'  => [SecondJob::MONK(), 'PHP.Examples.SecondJob.MONK'],
			'SecondJob::ASSASSIN'  => [SecondJob::ASSASSIN(), 'PHP.Examples.SecondJob.ASSASSIN'],
			'SecondJob::ROGUE'  => [SecondJob::ROGUE(), 'PHP.Examples.SecondJob.ROGUE'],
			'SecondJob::HUNTER'  => [SecondJob::HUNTER(), 'PHP.Examples.SecondJob.HUNTER'],
			'SecondJob::BARD'  => [SecondJob::BARD(), 'PHP.Examples.SecondJob.BARD'],
			'SecondJob::DANCER'  => [SecondJob::DANCER(), 'PHP.Examples.SecondJob.DANCER'],
			'Planet::MERCURY'  => [Planet::MERCURY(), 'PHP.Examples.Planet.MERCURY'],
			'Planet::VENUS'  => [Planet::VENUS(), 'PHP.Examples.Planet.VENUS'],
			'Planet::EARTH'  => [Planet::EARTH(), 'PHP.Examples.Planet.EARTH'],
			'Planet::MARS'  => [Planet::MARS(), 'PHP.Examples.Planet.MARS'],
			'Planet::JUPITER'  => [Planet::JUPITER(), 'PHP.Examples.Planet.JUPITER'],
			'Planet::SATURN'  => [Planet::SATURN(), 'PHP.Examples.Planet.SATURN'],
			'Planet::URANUS'  => [Planet::URANUS(), 'PHP.Examples.Planet.URANUS'],
			'Planet::NEPTUNE'  => [Planet::NEPTUNE(), 'PHP.Examples.Planet.NEPTUNE'],
			'Color::RED'  => [Color::RED(), 'PHP.Examples.Color.RED'],
			'Color::BLUE' => [Color::BLUE(), 'PHP.Examples.Color.BLUE'],
			'ExtendedColor::GREEN' => [ExtendedColor::GREEN(), 'PHP.Examples.ExtendedColor.GREEN'],
		];
	}

	public function enumValuesAndName (): array
	{
		return [
			'DayOfTheWeek::SUNDAY'  => [DayOfTheWeek::SUNDAY(), 'SUNDAY'],
			'DayOfTheWeek::MONDAY'  => [DayOfTheWeek::MONDAY(), 'MONDAY'],
			'DayOfTheWeek::TUESDAY'  => [DayOfTheWeek::TUESDAY(), 'TUESDAY'],
			'DayOfTheWeek::WEDNESDAY'  => [DayOfTheWeek::WEDNESDAY(), 'WEDNESDAY'],
			'DayOfTheWeek::THURSDAY'  => [DayOfTheWeek::THURSDAY(), 'THURSDAY'],
			'DayOfTheWeek::FRIDAY'  => [DayOfTheWeek::FRIDAY(), 'FRIDAY'],
			'DayOfTheWeek::SATURDAY'  => [DayOfTheWeek::SATURDAY(), 'SATURDAY'],
			'Job::NOVICE'  => [Job::NOVICE(), 'NOVICE'],
			'FirstJob::SWORDMAN'  => [FirstJob::SWORDMAN(), 'SWORDMAN'],
			'FirstJob::MAGE'  => [FirstJob::MAGE(), 'MAGE'],
			'FirstJob::MERCHANT'  => [FirstJob::MERCHANT(), 'MERCHANT'],
			'FirstJob::ACOLYTE'  => [FirstJob::ACOLYTE(), 'ACOLYTE'],
			'FirstJob::THIEF'  => [FirstJob::THIEF(), 'THIEF'],
			'FirstJob::ARCHER'  => [FirstJob::ARCHER(), 'ARCHER'],
			'SecondJob::KNIGHT'  => [SecondJob::KNIGHT(), 'KNIGHT'],
			'SecondJob::CRUSADER'  => [SecondJob::CRUSADER(), 'CRUSADER'],
			'SecondJob::WIZARD'  => [SecondJob::WIZARD(), 'WIZARD'],
			'SecondJob::SAGE'  => [SecondJob::SAGE(), 'SAGE'],
			'SecondJob::BLACKSMITH'  => [SecondJob::BLACKSMITH(), 'BLACKSMITH'],
			'SecondJob::ALCHEMIST'  => [SecondJob::ALCHEMIST(), 'ALCHEMIST'],
			'SecondJob::PRIEST'  => [SecondJob::PRIEST(), 'PRIEST'],
			'SecondJob::MONK'  => [SecondJob::MONK(), 'MONK'],
			'SecondJob::ASSASSIN'  => [SecondJob::ASSASSIN(), 'ASSASSIN'],
			'SecondJob::ROGUE'  => [SecondJob::ROGUE(), 'ROGUE'],
			'SecondJob::HUNTER'  => [SecondJob::HUNTER(), 'HUNTER'],
			'SecondJob::BARD'  => [SecondJob::BARD(), 'BARD'],
			'SecondJob::DANCER'  => [SecondJob::DANCER(), 'DANCER'],
			'Planet::MERCURY'  => [Planet::MERCURY(), 'MERCURY'],
			'Planet::VENUS'  => [Planet::VENUS(), 'VENUS'],
			'Planet::EARTH'  => [Planet::EARTH(), 'EARTH'],
			'Planet::MARS'  => [Planet::MARS(), 'MARS'],
			'Planet::JUPITER'  => [Planet::JUPITER(), 'JUPITER'],
			'Planet::SATURN'  => [Planet::SATURN(), 'SATURN'],
			'Planet::URANUS'  => [Planet::URANUS(), 'URANUS'],
			'Planet::NEPTUNE'  => [Planet::NEPTUNE(), 'NEPTUNE'],
			'Color::RED'  => [Color::RED(), 'RED'],
			'Color::BLUE' => [Color::BLUE(), 'BLUE'],
			'ExtendedColor::GREEN' => [ExtendedColor::GREEN(), 'GREEN'],
		];
	}

	public function enumClassesAndName (): array
	{
		return [
			'DayOfTheWeek::SUNDAY'  => [DayOfTheWeek::class, 'SUNDAY'],
			'DayOfTheWeek::MONDAY'  => [DayOfTheWeek::class, 'MONDAY'],
			'DayOfTheWeek::TUESDAY'  => [DayOfTheWeek::class, 'TUESDAY'],
			'DayOfTheWeek::WEDNESDAY'  => [DayOfTheWeek::class, 'WEDNESDAY'],
			'DayOfTheWeek::THURSDAY'  => [DayOfTheWeek::class, 'THURSDAY'],
			'DayOfTheWeek::FRIDAY'  => [DayOfTheWeek::class, 'FRIDAY'],
			'DayOfTheWeek::SATURDAY'  => [DayOfTheWeek::class, 'SATURDAY'],
			'Job::NOVICE'  => [Job::class, 'NOVICE'],
			'FirstJob::NOVICE'  => [FirstJob::class, 'NOVICE'],
			'FirstJob::SWORDMAN'  => [FirstJob::class, 'SWORDMAN'],
			'FirstJob::MAGE'  => [FirstJob::class, 'MAGE'],
			'FirstJob::MERCHANT'  => [FirstJob::class, 'MERCHANT'],
			'FirstJob::ACOLYTE'  => [FirstJob::class, 'ACOLYTE'],
			'FirstJob::THIEF'  => [FirstJob::class, 'THIEF'],
			'FirstJob::ARCHER'  => [FirstJob::class, 'ARCHER'],
			'SecondJob::NOVICE'  => [Job::class, 'NOVICE'],
			'SecondJob::SWORDMAN'  => [FirstJob::class, 'SWORDMAN'],
			'SecondJob::MAGE'  => [FirstJob::class, 'MAGE'],
			'SecondJob::MERCHANT'  => [FirstJob::class, 'MERCHANT'],
			'SecondJob::ACOLYTE'  => [FirstJob::class, 'ACOLYTE'],
			'SecondJob::THIEF'  => [FirstJob::class, 'THIEF'],
			'SecondJob::ARCHER'  => [FirstJob::class, 'ARCHER'],
			'SecondJob::KNIGHT'  => [SecondJob::class, 'KNIGHT'],
			'SecondJob::CRUSADER'  => [SecondJob::class, 'CRUSADER'],
			'SecondJob::WIZARD'  => [SecondJob::class, 'WIZARD'],
			'SecondJob::SAGE'  => [SecondJob::class, 'SAGE'],
			'SecondJob::BLACKSMITH'  => [SecondJob::class, 'BLACKSMITH'],
			'SecondJob::ALCHEMIST'  => [SecondJob::class, 'ALCHEMIST'],
			'SecondJob::PRIEST'  => [SecondJob::class, 'PRIEST'],
			'SecondJob::MONK'  => [SecondJob::class, 'MONK'],
			'SecondJob::ASSASSIN'  => [SecondJob::class, 'ASSASSIN'],
			'SecondJob::ROGUE'  => [SecondJob::class, 'ROGUE'],
			'SecondJob::HUNTER'  => [SecondJob::class, 'HUNTER'],
			'SecondJob::BARD'  => [SecondJob::class, 'BARD'],
			'SecondJob::DANCER'  => [SecondJob::class, 'DANCER'],
			'Planet::MERCURY'  => [Planet::class, 'MERCURY'],
			'Planet::VENUS'  => [Planet::class, 'VENUS'],
			'Planet::EARTH'  => [Planet::class, 'EARTH'],
			'Planet::MARS'  => [Planet::class, 'MARS'],
			'Planet::JUPITER'  => [Planet::class, 'JUPITER'],
			'Planet::SATURN'  => [Planet::class, 'SATURN'],
			'Planet::URANUS'  => [Planet::class, 'URANUS'],
			'Planet::NEPTUNE'  => [Planet::class, 'NEPTUNE'],
			'Color::RED'  => [Color::class, 'RED'],
			'Color::BLUE' => [Color::class, 'BLUE'],
			'ExtendedColor::RED' => [ExtendedColor::class, 'RED'],
			'ExtendedColor::BLUE' => [ExtendedColor::class, 'BLUE'],
			'ExtendedColor::GREEN' => [ExtendedColor::class, 'GREEN'],
		];
	}

	public function enumClassesAndValues (): array
	{
		return [
			'DayOfTheWeek'  => [DayOfTheWeek::class, [DayOfTheWeek::SUNDAY(), DayOfTheWeek::MONDAY(), DayOfTheWeek::TUESDAY(), DayOfTheWeek::WEDNESDAY(), DayOfTheWeek::THURSDAY(), DayOfTheWeek::FRIDAY(), DayOfTheWeek::SATURDAY()]],
			'Job'  => [Job::class, [Job::NOVICE()]],
			'FirstJob'  => [FirstJob::class, [FirstJob::NOVICE(), FirstJob::SWORDMAN(), FirstJob::MAGE(), FirstJob::MERCHANT(), FirstJob::ACOLYTE(), FirstJob::THIEF(), FirstJob::ARCHER()]],
			'SecondJob'  => [SecondJob::class, [SecondJob::NOVICE(), SecondJob::SWORDMAN(), SecondJob::MAGE(), SecondJob::MERCHANT(), SecondJob::ACOLYTE(), SecondJob::THIEF(), SecondJob::ARCHER(), SecondJob::KNIGHT(), SecondJob::CRUSADER(), SecondJob::WIZARD(), SecondJob::SAGE(), SecondJob::BLACKSMITH(), SecondJob::ALCHEMIST(), SecondJob::PRIEST(), SecondJob::MONK(), SecondJob::ASSASSIN(), SecondJob::ROGUE(), SecondJob::HUNTER(), SecondJob::BARD(), SecondJob::DANCER()]],
			'Planet' => [Planet::class, [Planet::MERCURY(), Planet::VENUS(), Planet::EARTH(), Planet::MARS(), Planet::JUPITER(), Planet::SATURN(), Planet::URANUS(), Planet::NEPTUNE()]],
			'Color'  => [Color::class, [Color::RED(), Color::BLUE()]],
			'ExtendedColor' => [ExtendedColor::class, [ExtendedColor::RED(), ExtendedColor::BLUE(), ExtendedColor::GREEN()]],
		];
	}

	public function enumValuesAndClass (): array
	{
		return [
			'DayOfTheWeek::SUNDAY'  => [DayOfTheWeek::SUNDAY(), DayOfTheWeek::class],
			'DayOfTheWeek::MONDAY'  => [DayOfTheWeek::MONDAY(), DayOfTheWeek::class],
			'DayOfTheWeek::TUESDAY'  => [DayOfTheWeek::TUESDAY(), DayOfTheWeek::class],
			'DayOfTheWeek::WEDNESDAY'  => [DayOfTheWeek::WEDNESDAY(), DayOfTheWeek::class],
			'DayOfTheWeek::THURSDAY'  => [DayOfTheWeek::THURSDAY(), DayOfTheWeek::class],
			'DayOfTheWeek::FRIDAY'  => [DayOfTheWeek::FRIDAY(), DayOfTheWeek::class],
			'DayOfTheWeek::SATURDAY'  => [DayOfTheWeek::SATURDAY(), DayOfTheWeek::class],
			'Job::NOVICE'  => [Job::NOVICE(), Job::class],
			'FirstJob::NOVICE'  => [FirstJob::NOVICE(), Job::class],
			'FirstJob::SWORDMAN'  => [FirstJob::SWORDMAN(), FirstJob::class],
			'FirstJob::MAGE'  => [FirstJob::MAGE(), FirstJob::class],
			'FirstJob::MERCHANT'  => [FirstJob::MERCHANT(), FirstJob::class],
			'FirstJob::ACOLYTE'  => [FirstJob::ACOLYTE(), FirstJob::class],
			'FirstJob::THIEF'  => [FirstJob::THIEF(), FirstJob::class],
			'FirstJob::ARCHER'  => [FirstJob::ARCHER(), FirstJob::class],
			'SecondJob::NOVICE'  => [SecondJob::NOVICE(), Job::class],
			'SecondJob::SWORDMAN'  => [SecondJob::SWORDMAN(), FirstJob::class],
			'SecondJob::MAGE'  => [SecondJob::MAGE(), FirstJob::class],
			'SecondJob::MERCHANT'  => [SecondJob::MERCHANT(), FirstJob::class],
			'SecondJob::ACOLYTE'  => [SecondJob::ACOLYTE(), FirstJob::class],
			'SecondJob::THIEF'  => [SecondJob::THIEF(), FirstJob::class],
			'SecondJob::ARCHER'  => [SecondJob::ARCHER(), FirstJob::class],
			'SecondJob::KNIGHT'  => [SecondJob::KNIGHT(), SecondJob::class],
			'SecondJob::CRUSADER'  => [SecondJob::CRUSADER(), SecondJob::class],
			'SecondJob::WIZARD'  => [SecondJob::WIZARD(), SecondJob::class],
			'SecondJob::SAGE'  => [SecondJob::SAGE(), SecondJob::class],
			'SecondJob::BLACKSMITH'  => [SecondJob::BLACKSMITH(), SecondJob::class],
			'SecondJob::ALCHEMIST'  => [SecondJob::ALCHEMIST(), SecondJob::class],
			'SecondJob::PRIEST'  => [SecondJob::PRIEST(), SecondJob::class],
			'SecondJob::MONK'  => [SecondJob::MONK(), SecondJob::class],
			'SecondJob::ASSASSIN'  => [SecondJob::ASSASSIN(), SecondJob::class],
			'SecondJob::ROGUE'  => [SecondJob::ROGUE(), SecondJob::class],
			'SecondJob::HUNTER'  => [SecondJob::HUNTER(), SecondJob::class],
			'SecondJob::BARD'  => [SecondJob::BARD(), SecondJob::class],
			'SecondJob::DANCER'  => [SecondJob::DANCER(), SecondJob::class],
			'Planet::MERCURY'  => [Planet::MERCURY(), Planet::class],
			'Planet::VENUS'  => [Planet::VENUS(), Planet::class],
			'Planet::EARTH'  => [Planet::EARTH(), Planet::class],
			'Planet::MARS'  => [Planet::MARS(), Planet::class],
			'Planet::JUPITER'  => [Planet::JUPITER(), Planet::class],
			'Planet::SATURN'  => [Planet::SATURN(), Planet::class],
			'Planet::URANUS'  => [Planet::URANUS(), Planet::class],
			'Planet::NEPTUNE'  => [Planet::NEPTUNE(), Planet::class],
			'Color::RED()'  => [Color::RED(), Color::class],
			'Color::BLUE()' => [Color::BLUE(), Color::class],
			'ExtendedColor::RED()' => [ExtendedColor::RED(), Color::class],
			'ExtendedColor::BLUE()' => [ExtendedColor::BLUE(), Color::class],
			'ExtendedColor::GREEN()' => [ExtendedColor::GREEN(), ExtendedColor::class],
		];
	}
}
