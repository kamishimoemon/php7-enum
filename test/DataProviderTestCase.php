<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

abstract class DataProviderTestCase extends TestCase
{
	public function enumerationClasses (): array
	{
		return [
			'Color'  => [Color::class],
			'ExtendedColor' => [ExtendedColor::class],
		];
	}
}
