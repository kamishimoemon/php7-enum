<?php

declare(strict_types=1);

namespace PHP;

use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;
use InvalidArgumentException;

trait Enumerable
{
	private static array $instances = [];

	private static final function initInstance (Enum $enum, ReflectionClass $class, string $name, int $ordinal): void
	{
		$enum->id = str_replace('\\', '.', $class->getName()) . '.' . $name;
		$enum->name = $name;
		$enum->ordinal = $ordinal;
	}

	private static function isEnumInstanceAsConstant (ReflectionClass $class, ReflectionClassConstant $const): bool
	{
		return $const->getDeclaringClass() == $class;
	}

	private static function newInstanceFromConstant (ReflectionClass $class, ReflectionClassConstant $const, int &$ordinality): Enumeration
	{
		$instance = $class->newInstanceWithoutConstructor();
		self::initInstance($instance, $class, $const->getName(), $ordinality++);
		return $instance;
	}

	private static function initConstEnum (ReflectionClass $class, int $ordinality): void
	{
		foreach ($class->getReflectionConstants() as $const)
		{
			if (self::isEnumInstanceAsConstant($class, $const))
			{
				$instance = self::newInstanceFromConstant($class, $const, $ordinality);
				self::$instances[$class->getName()][$instance->name()] = $instance;
			}
		}
	}

	private static function isEnumInstanceAsMethod (ReflectionClass $class, ReflectionMethod $method): bool
	{
		return $method->getDeclaringClass() == $class
			&& (($method->isPrivate() && $method->isStatic()) || ($method->isProtected() && $method->isStatic() && $method->isFinal()))
			&& ($method->hasReturnType() && ($method->getReturnType() == 'self' || $method->getReturnType() == $class->getName()))
		;
	}

	private static function newInstanceFromMethod (ReflectionClass $class, ReflectionMethod $method, int &$ordinality): Enumeration
	{
		$method->setAccessible(true);
		$instance = $method->invoke(null);
		self::initInstance($instance, $class, $method->getName(), $ordinality++);
		return $instance;
	}

	private static function initCustomEnum (ReflectionClass $class, int $ordinality): void
	{
		foreach ($class->getMethods() as $method)
		{
			if (self::isEnumInstanceAsMethod($class, $method))
			{
				$instance = self::newInstanceFromMethod($class, $method, $ordinality);
				self::$instances[$class->getName()][$instance->name()] = $instance;
			}
		}
	}

	private static function isCustomEnum (ReflectionClass $class): bool
	{
		if ($class->isAbstract()) return true;
		if ($class->getConstructor() !== null && $class->getConstructor()->getDeclaringClass() == $class) return true;
		foreach ($class->getProperties() as $property)
		{
			if ($property->getDeclaringClass() == $class) return true;
		}
		return false;
	}

	private static function initEnum (ReflectionClass $class, int $ordinality): void
	{
		if (!isset(self::$instances[$class->getName()]))
		{
			self::$instances[$class->getName()] = [];
			if (self::isCustomEnum($class)) self::initCustomEnum($class, $ordinality); else self::initConstEnum($class, $ordinality);
		}
	}

	private static function instances (ReflectionClass $class, int $ordinality): array
	{
		self::initEnum($class, $ordinality);
		return self::$instances[$class->getName()];
	}

	private static function hasParentClass (ReflectionClass $class): bool
	{
		return $class->getParentClass() !== false && $class->getParentClass()->getName() !== self::class;
	}

	private static function valuesAsMap (ReflectionClass $class): array
	{
		if (self::hasParentClass($class))
		{
			$parentValues = self::valuesAsMap($class->getParentClass());
			return array_merge($parentValues, self::instances($class, count($parentValues) - 1));
		}
		return self::instances($class, 0);
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

	private string $id;
	private string $name;
	private int $ordinal;

	protected function __construct () {}

	public final function id (): string
	{
		return $this->id;
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
