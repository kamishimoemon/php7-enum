<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\BaseEnumeration;

final class DayOfTheWeek extends BaseEnumeration
{
	/** @PHP\EnumValue */ public const SUNDAY = 1;
	/** @PHP\EnumValue */ public const MONDAY = 2;
	/** @PHP\EnumValue */ public const TUESDAY = 3;
	/** @PHP\EnumValue */ public const WEDNESDAY = 4;
	/** @PHP\EnumValue */ public const THURSDAY = 5;
	/** @PHP\EnumValue */ public const FRIDAY = 6;
	/** @PHP\EnumValue */ public const SATURDAY = 7;
}
