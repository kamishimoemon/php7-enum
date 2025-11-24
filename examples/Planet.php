<?php

declare(strict_types=1);

namespace PHP\Examples;

use PHP\CustomEnum;

final class Planet extends CustomEnum
{
	public const G = 6.67300E-11;

	protected static final function MERCURY (): Planet
	{
		return new self(3.303e+23, 2.4397e6);
	}

	protected static final function VENUS (): Planet
	{
		return new self(4.869e+24, 6.0518e6);
	}

	protected static final function EARTH (): Planet
	{
		return new self(5.976e+24, 6.37814e6);
	}

	protected static final function MARS (): Planet
	{
		return new self(6.421e+23, 3.3972e6);
	}

	protected static final function JUPITER (): Planet
	{
		return new self(1.9e+27,   7.1492e7);
	}

	protected static final function SATURN (): Planet
	{
		return new self(5.688e+26, 6.0268e7);
	}

	protected static final function URANUS (): Planet
	{
		return new self(8.686e+25, 2.5559e7);
	}

	protected static final function NEPTUNE (): Planet
	{
		return new self(1.024e+26, 2.4746e7);
	}

	private float $mass;
	private float $radius;

	protected function __construct (float $mass, float $radius)
	{
		$this->mass = $mass;
		$this->radius = $radius;
	}

	public function mass (): float
	{
		return $this->mass;
	}

	public function radius (): float
	{
		return $this->radius;
	}

	public function surfaceGravity (): float
	{
		return self::G * $this->mass / ($this->radius * $this->radius);
	}

	public function surfaceWeight (float $mass): float
	{
		return $mass * $this->surfaceGravity();
	}

	public static final function main (): void
	{
		echo "Enter your weight on Earth: ";
		$weightOnEarth = floatval(trim(fgets(STDIN)));
		$mass = $weightOnEarth / Planet::EARTH()->surfaceGravity();
		foreach (Planet::values() as $planet)
		{
			echo "Your weight on {$planet} is {$planet->surfaceWeight($mass)} kg." . PHP_EOL;
		}
	}
}
