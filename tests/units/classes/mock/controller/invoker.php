<?php

namespace atoum\atoum\tests\units\mock\controller;

require_once __DIR__ . '/../../../runner.php';

use atoum\atoum;

class invoker extends atoum\test
{
    public function testClass()
    {
        $this->testedClass->extends(atoum\test\adapter\invoker::class);
    }

    public function test__construct()
    {
        $this
            ->given($this->newTestedInstance($method = uniqid()))
            ->then
                ->string($this->testedInstance->getFunction())->isEqualTo($method)
                ->variable($this->testedInstance->getMock())->isNull()

            ->given($this->newTestedInstance($method = uniqid(), $mock = new \mock\foo()))
            ->then
                ->string($this->testedInstance->getFunction())->isEqualTo($method)
                ->object($this->testedInstance->getMock())->isIdenticalTo($mock)
        ;
    }

    public function testIsFluent()
    {
        $this
            ->if($this->newTestedInstance($method = uniqid(), $mock = new \mock\foo()))
            ->then
                ->object($this->testedInstance->isFluent())->isTestedInstance
                ->object($this->testedInstance->invoke())->isIdenticalTo($mock)

            ->if($this->newTestedInstance($method = uniqid(), $mock = new \mock\foo()))
            ->then
                ->object($this->testedInstance->isFluent)->isTestedInstance
                ->object($this->testedInstance->invoke())->isIdenticalTo($mock)
        ;
    }
}
