<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Test;

use PHPUnit\Framework\TestCase;

/**
 * @covers \PHPUnit\Event\Test\AfterTest
 */
final class AfterTestTest extends TestCase
{
    public function testTypeIsAfterTest(): void
    {
        $event = new AfterTest(
            new Test(),
            $this->createMock(Result::class)
        );

        $this->assertTrue($event->type()->is(new AfterTestType()));
    }

    public function testConstructorSetsValues(): void
    {
        $test = new Test();

        $result = $this->createMock(Result::class);

        $event = new AfterTest(
            $test,
            $result
        );

        $this->assertSame($test, $event->test());
        $this->assertSame($result, $event->result());
    }
}
