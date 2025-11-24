<?php

declare(strict_types=1);

namespace PHP;

use ReflectionClass;
use ReflectionClassConstant;
use InvalidArgumentException;

abstract class ConstEnum extends Enum
{
	private static array $instances = [];

	private static function newInstance (ReflectionClass $class, ReflectionClassConstant $const, int &$ordinality): Enumeration
	{
		$instance = $class->newInstanceWithoutConstructor();
		parent::initInstance($instance, $class, $const->getName(), $ordinality++);
		return $instance;
	}

	private static function initClass (ReflectionClass $class, int $ordinality): void
	{
		if (!isset(self::$instances[$class->getName()]))
		{
			self::$instances[$class->getName()] = [];
			foreach ($class->getReflectionConstants() as $const)
			{
				if ($const->getDeclaringClass() == $class)
				{
					$instance = self::newInstance($class, $const, $ordinality);
					self::$instances[$class->getName()][$instance->name()] = $instance;
				}
			}
		}
	}

	protected static final function instances (ReflectionClass $class, int $ordinality): array
	{
		self::initClass($class, $ordinality);
		return self::$instances[$class->getName()];
	}

	protected static final function hasParentClass (ReflectionClass $class): bool
	{
		return $class->getParentClass() !== false && $class->getParentClass()->getName() !== self::class;
	}
}
