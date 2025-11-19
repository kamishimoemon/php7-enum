<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\Enumeration;
use PHP\BaseEnumeration;
use PHP\EnumValue;

abstract class Color extends BaseEnumeration
{
	/**
	 * @PHP\EnumValue
	 */
	#[EnumValue(ID='PHP.Examples.Color.RED', name='RED')]
	public static function RED (): self
	{
		return self::$instances['RED'] ??= new class('RED', '#FF0000') extends Color {
			use EnumValue;
			public function isWarm (): bool { return true; }
		};
	}

	/**
	 * @PHP\EnumValue
	 */
	#[EnumValue(ID='PHP.Examples.Color.BLUE', name='BLUE')]
	public static function BLUE (): self
	{
		return self::$instances['BLUE'] ??= new Blue();
	}

	private string $hex;

	protected function __construct (string $name, string $hex)
	{
		parent::__construct($name);
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
		parent::__construct('BLUE', '#0000FF');
	}

	public function isWarm (): bool
	{
		return false;
	}
}
