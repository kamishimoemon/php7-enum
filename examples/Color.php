<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\CustomEnum;

abstract class Color extends CustomEnum
{
	protected static final function RED (): self
	{
		return new class('#FF0000') extends Color {
			public function isWarm (): bool { return true; }
		};
	}

	protected static final function BLUE (): self
	{
		return new Blue();
	}

	private string $hex;

	protected function __construct (string $hex)
	{
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
	protected function __construct ()
	{
		parent::__construct('#0000FF');
	}

	public function isWarm (): bool
	{
		return false;
	}
}
