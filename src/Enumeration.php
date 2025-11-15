<?php

declare(strict_types=1);

namespace PHP;

/**
 * Enumeration interface for Java-style enums in PHP 7.4.
 *
 * @package PHP
 */
interface Enumeration
{
	/**
	 * Returns all defined enum instances for the concrete implementation.
	 *
	 * @return self[] A list of all enum instances.
	 */
	public static function values (): array;

	/**
	 * Returns the enum instance matching the given name.
	 *
	 * @param string $name The name of the enum instance to retrieve.
	 * @return self The matching enum instance.
	 * @throws \InvalidArgumentException If no matching instance is found.
	 */
	public static function valueOf (string $name): self;

	/**
	 * Returns the fully qualified identifier of this enum instance.
	 * Example: "Domain.Color.RED"
	 *
	 * @return string The fully qualified ID of the enum.
	 */
	public function id (): string;

	/**
	 * Returns the raw name of this enum instance.
	 * Example: "RED"
	 *
	 * @return string The simple name of the enum.
	 */
	public function name (): string;

	/**
	 * Compares this enum with another instance for logical equality.
	 *
	 * @param self $other The other instance to compare against.
	 * @return bool True if both instances are logically equal.
	 */
	public function equals (self $other): bool;

	/**
	 * Returns the string representation of this enum instance.
	 * By default, this should match the result of {@see name()}.
	 * An enum class should override this method when a more "programmer-friendly" string form exists.
	 *
	 * @return string The string value of the enum.
	 */
	public function __toString (): string;

	/**
	 * Prevents cloning of enum instances.
	 *
	 * Implementations must override this method to explicitly forbid cloning,
	 * typically by declaring it as `final` and throwing a LogicException.
	 *
	 * Enums are unique by definition and should never be duplicated.
	 *
	 * @throws \LogicException Always
	 */
	public function __clone ();

	/**
	 * Blocks legacy PHP serialization.
	 *
	 * Implementations must override this method to explicitly forbid
	 * serialization via `serialize()`, typically by throwing a LogicException.
	 *
	 * This method is only invoked if `__serialize()` is not defined.
	 *
	 * @throws \LogicException Always
	 * @return array Never returns — always throws.
	 */
	public function __sleep (): array;

	/**
	 * Blocks modern PHP serialization (PHP 7.4+).
	 *
	 * Implementations must override this method to explicitly forbid
	 * serialization via `serialize()`, by throwing a LogicException.
	 *
	 * This method takes precedence over `__sleep()` if both are defined.
	 *
	 * @throws \LogicException Always
	 * @return array Never returns — always throws.
	 */
	public function __serialize(): array;
}
