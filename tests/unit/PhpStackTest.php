<?php

namespace unit;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Web136\PhpStack\PhpStack;

class PhpStackTest extends TestCase
{

    protected PhpStack $PhpStack;

    public function setUp(): void
    {
        parent::setUp();
        $this->PhpStack = new PhpStack();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        unset($this->PhpStack);
    }

    public function testPush()
    {
        $this->PhpStack->push(17);

        self::assertEquals(17, $this->PhpStack->top());
    }

    public function testPushLength()
    {
        $this->PhpStack->push();

        self::assertEquals(1, $this->PhpStack->length());
    }

    public function testPop()
    {
        $this->PhpStack->push();
        $this->PhpStack->push();
        $this->PhpStack->push(17);

        self::assertEquals(17, $this->PhpStack->pop());
    }

    public function testPopLength()
    {
        $this->PhpStack->push();
        $this->PhpStack->push();
        $this->PhpStack->push(17);
        $this->PhpStack->pop();

        self::assertEquals(2, $this->PhpStack->length());
    }

    public function testPopException()
    {
        self::expectException(RuntimeException::class);
        $this->PhpStack->pop();
    }

    public function testTop()
    {
        $this->PhpStack->push();
        $this->PhpStack->push();
        $this->PhpStack->push(17);

        self::assertEquals(17, $this->PhpStack->top());
    }

    public function testTopLength()
    {
        $this->PhpStack->push();
        $this->PhpStack->push();
        $this->PhpStack->push(17);
        $this->PhpStack->top();

        self::assertEquals(3, $this->PhpStack->length());
    }

    public function testTopException()
    {
        self::expectException(RuntimeException::class);
        $this->PhpStack->top();
    }

    public function testLength()
    {
        $this->PhpStack->push();
        $this->PhpStack->push();
        $this->PhpStack->push();

        self::assertEquals(3, $this->PhpStack->length());
    }

    public function testIsEmptyTrue()
    {
        self::assertTrue($this->PhpStack->isEmpty());
    }

    public function testIsEmptyFalse()
    {
        $this->PhpStack->push();
        self::assertFalse($this->PhpStack->isEmpty());
    }

}
