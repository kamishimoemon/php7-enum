<?php

declare(strict_types=1);

namespace PHP;

/**
 * Trait EnumValue
 *
 * Provides a common implementation for the `Enumeration::id()` method.
 * 
 * Returns the fully qualified identifier in the format:
 * Namespace.ClassName.EnumValueName
 *
 * This trait is intended to be used in anonymous or concrete subclasses of an abstract enum base.
 */
trait EnumValue
{
	/**
	 * Returns the fully qualified ID of the enum value.
	 *
	 * Example: "PHP.Examples.Color.RED"
	 *
	 * @return string
	 * @throws \LogicException if the trait is used in a class without a parent
	 */
	public function id (): string
	{
		$parent = get_parent_class($this);

		if ($parent === false) {
			throw new \LogicException('EnumValue trait must be used in a class that extends an enum base class.');
		}

		return str_replace('\\', '.', $parent) . '.' . $this->name();
	}
}
