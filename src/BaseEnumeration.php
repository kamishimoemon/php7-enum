<?php

declare(strict_types=1);

namespace PHP;

use ReflectionClass;
use ReflectionMethod;

abstract class BaseEnumeration implements Enumeration
{
	private static array $instances = [];

	public static function values (): array
	{
		$class = new ReflectionClass(static::class);
		if (!isset(self::$instances[$class->getName()]))
		{
			self::$instances[$class->getName()] = [];
			foreach ($class->getMethods(ReflectionMethod::IS_STATIC) as $method)
			{
				$doc = $method->getDocComment();
				if ($doc && strpos($doc, '@PHP\EnumValue') !== false && !isset(self::$instances[$class->getName()][$method->getName()])) {
					$method->setAccessible(true);
					self::$instances[$class->getName()][$method->getName()] = $method->invoke(null);
				}
			}
			foreach ((new ReflectionClass(static::class))->getReflectionConstants() as $const)
			{
				$doc = $const->getDocComment();
				if ($doc && strpos($doc, '@PHP\EnumValue') !== false && !isset(self::$instances[$const->getName()])) {
					self::$instances[$class->getName()][$const->getName()] = new static($const->getName());
				}
			}
		}
		return self::$instances[$class->getName()];
	}

	public static function valueOf (string $name): self
	{
		foreach (static::values() as $instance)
		{
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
