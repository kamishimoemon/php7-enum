<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\Enumeration;

final class Color implements Enumeration
{
	private static array $instances = [];

	public static function values (): array
	{
		return [
			self::RED(),
			self::BLUE(),
		];
	}

	public static function valueOf (string $name): self
	{
		foreach (self::values() as $instance) {
			if ($instance->name === $name) {
				return $instance;
			}
		}

		throw new \InvalidArgumentException("No enum constant Color::{$name}");
	}

	public static function RED (): self
	{
		return self::$instances['RED'] ??= new self('RED');
	}

	public static function BLUE (): self
	{
		return self::$instances['BLUE'] ??= new self('BLUE');
	}

	private string $name;

	private function __construct (string $name)
	{
		$this->name = $name;
	}

	public function id (): string
	{
		throw new \RuntimeException("Method not implemented yet.");
	}

	public function name (): string
	{
		return $this->name;
	}

	public function equals (Enumeration $other): bool
	{
		return $this === $other;
	}

	public function __toString (): string
	{
		return $this->name;
	}
}
