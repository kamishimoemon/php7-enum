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
}
