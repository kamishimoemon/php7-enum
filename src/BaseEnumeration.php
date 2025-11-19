<?php

declare(strict_types=1);

namespace PHP;

use ReflectionClass;
use ReflectionMethod;

abstract class BaseEnumeration implements Enumeration
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
			if ($instance->name() === $name) {
				return $instance;
			}
		}

		throw new \InvalidArgumentException("No enum constant Color::{$name}");
	}

	private string $name;

	protected function __construct (string $name)
	{
		$this->name = $name;
	}

	public function id (): string
	{
		return str_replace('\\', '.', static::class) . '.' . $this->name;
	}

	public final function name (): string
	{
		return $this->name;
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
