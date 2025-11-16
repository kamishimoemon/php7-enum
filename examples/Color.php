<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\Enumeration;
use PHP\EnumValue;
use ReflectionClass;
use ReflectionMethod;

abstract class Color implements Enumeration
{
	protected static array $instances = [];

	public static function values (): array
	{
		$values = [];
		foreach ((new ReflectionClass(static::class))->getMethods(ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_STATIC) as $method) {
			$doc = $method->getDocComment();
			if ($doc && strpos($doc, '@PHP\EnumValue') !== false) {
				$values[] = $method->invoke(null);
			}
		}
		return $values;
	}

	public static function valueOf (string $name): self
	{
		foreach (static::values() as $instance) {
			if ($instance->name === $name) {
				return $instance;
			}
		}

		throw new \InvalidArgumentException("No enum constant Color::{$name}");
	}

	/**
	 * @PHP\EnumValue
	 */
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
	public static function BLUE (): self
	{
		return self::$instances['BLUE'] ??= new Blue();
	}

	private string $name;
	private string $hex;

	protected function __construct (string $name, string $hex)
	{
		$this->name = $name;
		$this->hex = $hex;
	}

	public function id (): string
	{
		return str_replace('\\', '.', static::class) . '.' . $this->name;
	}

	public function name (): string
	{
		return $this->name;
	}

	public function hex (): string
	{
		return $this->hex;
	}

	public abstract function isWarm (): bool;

	public function equals (Enumeration $other): bool
	{
		return $this === $other;
	}

	public function __toString (): string
	{
		return $this->name;
	}

	public final function __clone ()
	{
		throw new \LogicException('Cloning of enum instances is not allowed.');
	}

	public function __sleep (): array
	{
		throw new \LogicException('Serialization of enum instances is not allowed.');
	}

	public function __serialize (): array
	{
		throw new \LogicException('Serialization of enum instances is not allowed.');
	}
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
