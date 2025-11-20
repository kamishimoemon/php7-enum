<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\Enumeration;
use ReflectionClass;

final class DayOfTheWeek implements Enumeration
{
	private static array $instances = [];

	private /** @PHP\EnumValue */ const SUNDAY = 1;
	private /** @PHP\EnumValue */ const MONDAY = 2;
	private /** @PHP\EnumValue */ const TUESDAY = 3;
	private /** @PHP\EnumValue */ const WEDNESDAY = 4;
	private /** @PHP\EnumValue */ const THURSDAY = 5;
	private /** @PHP\EnumValue */ const FRIDAY = 6;
	private /** @PHP\EnumValue */ const SATURDAY = 7;

	public static function values (): array
	{
		$values = [];
		foreach ((new ReflectionClass(static::class))->getReflectionConstants() as $const) {
			$doc = $const->getDocComment();
			if ($doc && strpos($doc, '@PHP\EnumValue') !== false) {
				$values[] = new static($const->getName());
			}
		}
		return $values;
	}

	public static function valueOf (string $name): self
	{
		foreach (static::values() as $instance) {
			if ($instance->name() === $name) {
				return $instance;
			}
		}

		$class = static::class;
		throw new \InvalidArgumentException("No enum constant {$class}::{$name}");
	}

	public static function __callStatic (string $name, array $arguments): self
	{
		return static::valueOf($name);
	}

	private string $name;

	protected function __construct (string $name)
	{
		$this->name = $name;
	}

	public final function name (): string
	{
		return $this->name;
	}

	public function id (): string
	{
		return str_replace('\\', '.', static::class) . '.' . $this->name;
	}

	public final function equals ($other): bool
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

	public final function __sleep (): array
	{
		throw new \LogicException('Serialization of enum instances is not allowed.');
	}

	public final function __serialize (): array
	{
		throw new \LogicException('Serialization of enum instances is not allowed.');
	}
}
