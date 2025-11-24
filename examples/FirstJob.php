<?php

declare(strict_types=1);

namespace PHP\Examples;

/**
 * Example of subclassing a ConstEnum's enum.
 * Parent's instances cannot be overriden.
 */
class FirstJob extends Job
{
	const SWORDMAN = 1;
	const MAGE = 2;
	const MERCHANT = 3;
	const ACOLYTE = 4;
	const THIEF = 5;
	const ARCHER = 6;
}
