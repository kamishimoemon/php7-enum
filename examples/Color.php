<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\Enumeration;
use PHP\Enum;
use PHP\EnumValue;

abstract class Color extends Enum
{
	/**
	 * @PHP\EnumValue
	 */
	#[EnumValue(ID='PHP.Examples.Color.RED', name='RED')]
	private static function RED (): self
	{
		return new class('RED', 0, '#FF0000') extends Color {
			use EnumValue;
			public function isWarm (): bool { return true; }
		};
	}

	/**
	 * @PHP\EnumValue
	 */
	#[EnumValue(ID='PHP.Examples.Color.BLUE', name='BLUE')]
	private static function BLUE (): self
	{
		return new Blue();
	}

	private string $hex;

	protected function __construct (string $name, int $ordinal, string $hex)
	{
		parent::__construct($name, $ordinal);
		$this->hex = $hex;
	}

	public function hex (): string
	{
		return $this->hex;
	}

	public abstract function isWarm (): bool;
}

final class Blue extends Color
{
	use EnumValue;

	protected function __construct ()
	{
		parent::__construct('BLUE', 1, '#0000FF');
	}

	public function isWarm (): bool
	{
		return false;
	}
}
