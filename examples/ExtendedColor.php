<?php

declare(strict_types=1);

namespace PHP\Examples;

final class ExtendedColor extends Color
{
	private bool $warm;

	protected function __construct (string $name, string $hex, bool $warm)
	{
		parent::__construct($name, $hex);
		$this->warm = $warm;
	}

	public function isWarm (): bool
	{
		return $this->warm;
	}

	/**
	 * @PHP\EnumValue
	 */
	public static function GREEN (): self
	{
		return self::$instances['GREEN'] ??= new self('GREEN', '#00FF00', true);
	}
}
