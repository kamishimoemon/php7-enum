<?php

declare(strict_types=1);

namespace PHP;

use ReflectionClass;
use ReflectionMethod;
use InvalidArgumentException;

abstract class CustomEnum extends Enum
{
	private static array $instances = [];

	private static function newInstance (ReflectionMethod $method, int &$ordinality): Enumeration
	{
		$method->setAccessible(true);
		$instance = $method->invoke(null);
		parent::initInstance($instance, $method->getName(), $ordinality++);
		return $instance;
	}

	private static function initClass (ReflectionClass $class, int $ordinality): void
	{
		if (!isset(self::$instances[$class->getName()]))
		{
			self::$instances[$class->getName()] = [];
			foreach ($class->getMethods() as $method)
			{
				if ($method->getDeclaringClass() == $class && $method->isProtected() && $method->isStatic() && $method->isFinal() && $method->hasReturnType() && ($method->getReturnType() == 'self' || $method->getReturnType() == $class->getName()))
				{
					$instance = self::newInstance($method, $ordinality);
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
