<?php

declare(strict_types=1);

namespace PHP;

use PHP\EnumValue;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;

abstract class BaseEnumeration implements Enumeration
{
	private static array $instances = [];

	private static function methodHasAnnotation (ReflectionMethod $method, string $className): bool
	{
		$doc = $method->getDocComment();
		return $doc && strpos($doc, '@'.$className) !== false;
	}

	private static function constHasAnnotation (ReflectionClassConstant $const, string $className): bool
	{
		$doc = $const->getDocComment();
		return $doc && strpos($doc, '@'.$className) !== false;
	}

	private static function hasParentClass (ReflectionClass $class): bool
	{
		return $class->getParentClass() !== false;
	}

	private static function initClass (ReflectionClass $class): void
	{
		if (!isset(self::$instances[$class->getName()]))
		{
			self::$instances[$class->getName()] = [];

			foreach ($class->getMethods(ReflectionMethod::IS_STATIC) as $method)
			{
				if (self::methodHasAnnotation($method, EnumValue::class) && $method->getDeclaringClass() == $class)
				{
					$method->setAccessible(true);
					$value = $method->invoke(null);
					// @todo: validar que no existan 2 valores con el mismo nombre en una clase (¿y sus descendientes?).
					self::$instances[$class->getName()][$value->name()] = $value;
				}
			}

			foreach ((new ReflectionClass(static::class))->getReflectionConstants() as $const)
			{
				if (self::constHasAnnotation($const, EnumValue::class) && $const->getDeclaringClass() == $class)
				{
					$value = new static($const->getName());
					// @todo: validar que no existan 2 valores con el mismo nombre en una clase (¿y sus descendientes?).
					self::$instances[$class->getName()][$value->name()] = $value;
				}
			}

			if ($class->getParentClass()) self::initClass($class->getParentClass());
		}
	}

	public static function valuesAsMap (ReflectionClass $class): array
	{
		if (self::hasParentClass($class)) return array_merge(self::valuesAsMap($class->getParentClass()), self::$instances[$class->getName()]);
		return self::$instances[$class->getName()];
	}

	public static function values (): array
	{
		$class = new ReflectionClass(static::class);
		self::initClass($class);
		return self::valuesAsMap($class);
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
