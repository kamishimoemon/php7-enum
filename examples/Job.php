<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\ConstEnum;

/**
 * Example of a simple enum with its instances defined as constansts.
 * This types must extend from PHP\ConstEnum.
 * ConstEnum classes don't define properties nor abstract methods but can declare non-abstract methods.
 * Every constant declared in this type of enum is considered an enum's instance with its name as the instance's name.
 * This means that Job::NOVICE constant makes possible to access it's related instance as:
 * - Job::NOVICE() or
 * - Job::valueOf('NOVICE')
 * 
 * Jobs tree from Ragnarok Online.
 */
class Job extends ConstEnum
{
	const NOVICE = 0;
}
