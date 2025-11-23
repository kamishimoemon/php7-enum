<?php

declare(strict_types=1);

namespace PHP\Examples;

final class ExtendedColor extends Color
{
	private bool $warm;

	protected function __construct (string $name, int $ordinal, string $hex, bool $warm)
	{
		parent::__construct($name, $ordinal, $hex);
		$this->warm = $warm;
	}

	public function isWarm (): bool
	{
		return $this->warm;
	}

	/**
	 * @PHP\EnumValue
	 */
	#[EnumValue(ID='PHP.Examples.ExtendedColor.GREEN', name='GREEN')]
	private static function GREEN (): self
	{
		return new self('GREEN', 2, '#00FF00', true);
	}
}
