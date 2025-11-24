<?php

declare(strict_types=1);

namespace PHP\Examples;

final class ExtendedColor extends Color
{
	private bool $warm;

	protected function __construct (string $hex, bool $warm)
	{
		parent::__construct($hex);
		$this->warm = $warm;
	}

	public function isWarm (): bool
	{
		return $this->warm;
	}

	protected static final function GREEN (): self
	{
		return new self('#00FF00', true);
	}
}
