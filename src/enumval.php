<?php

declare(strict_types=1);

namespace PHP;

use InvalidArgumentException;

function enumval (string $id): Enumeration
{
	$parts = explode('.', $id);

	if (count($parts) < 2) {
		throw new InvalidArgumentException("Invalid enum ID format: {$id}");
	}

	$name = array_pop($parts);
	$class = implode('\\', $parts);

	if (!class_exists($class)) {
		throw new InvalidArgumentException("Enum class not found: {$class}");
	}

	if (!is_subclass_of($class, \PHP\Enumeration::class)) {
		throw new InvalidArgumentException("{$class} is not an Enumeration");
	}

	return $class::valueOf($name);
}
