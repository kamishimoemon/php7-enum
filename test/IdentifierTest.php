<?php

declare(strict_types=1);

namespace PHP\Test;

use PHP\Enumeration;
use PHP\Examples\Color;
use PHP\Examples\ExtendedColor;

final class IdentifierTest extends DataProviderTestCase
{
	/**
	 * @dataProvider idProvider
	 */
	public function test_should_return_fully_qualified_id (string $id, Enumeration $value): void
	{
		$this->assertSame($id, $value->id());
	}

	public function idProvider (): array
	{
		return [
			'red'  => ['PHP.Examples.Color.RED',  Color::RED()],
			'blue' => ['PHP.Examples.Color.BLUE', Color::BLUE()],
			'green' => ['PHP.Examples.ExtendedColor.GREEN', ExtendedColor::GREEN()],
		];
	}
}
