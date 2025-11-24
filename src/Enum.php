<?php

declare(strict_types=1);

namespace PHP;

use ReflectionClass;
use InvalidArgumentException;

abstract class Enum implements Enumeration
{
	protected static final function initInstance (Enum $enum, string $name, int $ordinal): void
	{
		$enum->name = $name;
		$enum->ordinal = $ordinal;
	}

	protected static abstract function instances (ReflectionClass $class, int $ordinality): array;

	protected static abstract function hasParentClass (ReflectionClass $class): bool;

	private static function valuesAsMap (ReflectionClass $class): array
	{
		if (static::hasParentClass($class))
		{
			$parentValues = self::valuesAsMap($class->getParentClass());
			return array_merge($parentValues, static::instances($class, count($parentValues) - 1));
		}
		return static::instances($class, 0);
	}

	private static function valuesAsList (ReflectionClass $class): array
	{
		$list = array_values(self::valuesAsMap($class));
		usort($list, fn($x, $y) => $x->ordinal() - $y->ordinal());
		return $list;
	}

	public static final function values (): array
	{
		return self::valuesAsList(new ReflectionClass(static::class));
	}

	public static final function valueOf (string $name): self
	{
		$class = static::class;
		$values = self::valuesAsMap(new ReflectionClass($class));

		if (isset($values[$name])) return $values[$name];

		throw new InvalidArgumentException("No enum constant {$class}::{$name}");
	}

	public static final function __callStatic (string $name, array $arguments): self
	{
		return static::valueOf($name);
	}

	private string $name;
	private int $ordinal;

	private function __construct (string $name, int $ordinal)
	{
		$this->name = $name;
		$this->ordinal = $ordinal;
	}

	public function id (): string
	{
		return str_replace('\\', '.', static::class) . '.' . $this->name;
	}

	public final function name (): string
	{
		return $this->name;
	}

	public final function ordinal (): int
	{
		return $this->ordinal;
	}

	public final function equals (Enumeration $other): bool
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
