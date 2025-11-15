<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\Enumeration;

final class Color implements Enumeration
{
	private static array $instances = [];

	public static function values (): array
	{
		throw new \RuntimeException("Method not implemented yet.");
	}

	public static function valueOf (string $name): self
	{
		throw new \RuntimeException("Method not implemented yet.");
	}

	public static function RED (): self
	{
		return self::$instances['RED'] ??= new self('RED');
	}

	private function __construct () {}

	public function id (): string
	{
		throw new \RuntimeException("Method not implemented yet.");
	}

	public function name (): string
	{
		throw new \RuntimeException("Method not implemented yet.");
	}

	public function equals (Enumeration $other): bool
	{
		throw new \RuntimeException("Method not implemented yet.");
	}

	public function __toString (): string
	{
		throw new \RuntimeException("Method not implemented yet.");
	}
}
