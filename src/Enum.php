<?php

declare(strict_types=1);

namespace PHP;

use PHP\EnumValue;
use ReflectionClass;
use ReflectionClassConstant;
use ReflectionMethod;

abstract class Enum implements Enumeration
{
	private static array $instances = [];

	private static function methodHasAnnotation (ReflectionMethod $method, string $className): bool
	{
		$doc = $method->getDocComment();
		return $doc && strpos($doc, '@'.$className) !== false;
	}

	private static function hasParentClass (ReflectionClass $class): bool
	{
		return $class->getParentClass() !== false;
	}

	private static function newInstance (ReflectionClass $class, ReflectionClassConstant $const): Enumeration
	{
		$value = $class->newInstanceWithoutConstructor();
		$constructor = $class->getConstructor();
		$constructor->setAccessible(true);
		$constructor->invoke($value, $const->getName(), intval($const->getValue()));
		return $value;
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

			foreach ($class->getReflectionConstants() as $const)
			{
				if ($const->getDeclaringClass() == $class)
				{
					$value = self::newInstance($class, $const);
					// @todo: validar que no existan 2 valores con el mismo nombre en una clase (¿y sus descendientes?).
					self::$instances[$class->getName()][$value->name()] = $value;
				}
			}

			if ($class->getParentClass()) self::initClass($class->getParentClass());
		}
	}

	private static function valuesAsMap (ReflectionClass $class): array
	{
		self::initClass($class);
		if (self::hasParentClass($class)) return array_merge(self::valuesAsMap($class->getParentClass()), self::$instances[$class->getName()]);
		return self::$instances[$class->getName()];
	}

	private static function valuesAsList (ReflectionClass $class): array
	{
		$list = array_values(self::valuesAsMap($class));
		usort($list, fn($x, $y) => $x->ordinal() - $y->ordinal());
		return $list;
	}

	public static function values (): array
	{
		return self::valuesAsList(new ReflectionClass(static::class));
	}

	public static function valueOf (string $name): self
	{
		$class = static::class;
		$values = self::valuesAsMap(new ReflectionClass($class));

		if (isset($values[$name])) return $values[$name];

		throw new \InvalidArgumentException("No enum constant {$class}::{$name}");
	}

	public static function __callStatic (string $name, array $arguments): self
	{
		return static::valueOf($name);
	}

	private string $name;
	private int $ordinal;

	protected function __construct (string $name, int $ordinal)
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
