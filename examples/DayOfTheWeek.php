<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\BaseEnumeration;
use ReflectionClass;

final class DayOfTheWeek extends BaseEnumeration
{
	/** @PHP\EnumValue */ private const SUNDAY = 1;
	/** @PHP\EnumValue */ private const MONDAY = 2;
	/** @PHP\EnumValue */ private const TUESDAY = 3;
	/** @PHP\EnumValue */ private const WEDNESDAY = 4;
	/** @PHP\EnumValue */ private const THURSDAY = 5;
	/** @PHP\EnumValue */ private const FRIDAY = 6;
	/** @PHP\EnumValue */ private const SATURDAY = 7;
}
