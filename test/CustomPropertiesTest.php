<?php

declare(strict_types=1);

namespace PHP\Test;

use PHPUnit\Framework\TestCase;
use PHP\Examples\Color;

final class CustomPropertiesTest extends TestCase
{
	public function test_should_return_hex_code (): void
	{
		$this->assertSame('#FF0000', Color::RED()->hex());
		$this->assertSame('#0000FF', Color::BLUE()->hex());
	}
}
