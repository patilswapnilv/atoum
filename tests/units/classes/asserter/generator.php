<?php

namespace atoum\atoum\tests\units\asserter;

use atoum\atoum;
use atoum\atoum\asserter;
use atoum\atoum\test\assertion;

require_once __DIR__ . '/../../runner.php';

class generator extends atoum\test
{
    public function test__construct()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->object($this->testedInstance->getLocale())->isEqualTo(new atoum\locale())
                ->object($this->testedInstance->getResolver())->isEqualTo(new asserter\resolver())

            ->given($this->newTestedInstance($locale = new atoum\locale(), $resolver = new asserter\resolver(), $aliaser = new assertion\aliaser()))
            ->then
                ->object($this->testedInstance->getLocale())->isIdenticalTo($locale)
                ->object($this->testedInstance->getResolver())->isIdenticalTo($resolver)
        ;
    }

    public function test__get()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->exception(function () use (& $asserter) {
                    $this->testedInstance->{$asserter = uniqid()};
                })
                    ->isInstanceOf(atoum\exceptions\logic\invalidArgument::class)
                    ->hasMessage('Asserter \'' . $asserter . '\' does not exist')

                ->object($this->testedInstance->variable)->isInstanceOf(atoum\asserters\variable::class)
        ;
    }

    public function test__call()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->exception(function () use (& $asserter) {
                    $this->testedInstance->{$asserter = uniqid()}();
                })
                    ->isInstanceOf(atoum\exceptions\logic\invalidArgument::class)
                    ->hasMessage('Asserter \'' . $asserter . '\' does not exist')

                ->object($asserter = $this->testedInstance->variable($variable = uniqid()))->isInstanceOf(atoum\asserters\variable::class)
                ->string($asserter->getValue())->isEqualTo($variable)
        ;
    }

    public function testSetBaseClass()
    {
        $this
            ->given($this->newTestedInstance)

            ->if($this->testedInstance->setResolver($resolver = new \mock\atoum\atoum\asserter\resolver()))
            ->then
                ->object($this->testedInstance->setBaseClass($baseClass = uniqid()))->isTestedInstance
                ->mock($resolver)->call('setBaseClass')->withArguments($baseClass)->once
        ;
    }

    public function testGetBaseClass()
    {
        $this
            ->given($this->newTestedInstance)

            ->if(
                $this->testedInstance->setResolver($resolver = new \mock\atoum\atoum\asserter\resolver()),
                $this->calling($resolver)->getBaseClass = $baseClass = uniqid()
            )
            ->then
                ->string($this->testedInstance->getBaseClass())->isEqualTo($baseClass)
        ;
    }

    public function testAddNamespace()
    {
        $this
            ->given($this->newTestedInstance)

            ->if($this->testedInstance->setResolver($resolver = new \mock\atoum\atoum\asserter\resolver()))
            ->then
                ->object($this->testedInstance->addNamespace($namespace = uniqid()))->isTestedInstance
                ->mock($resolver)->call('addNamespace')->withArguments($namespace)->once
        ;
    }

    public function testGetNamespaces()
    {
        $this
            ->given($this->newTestedInstance)

            ->if(
                $this->testedInstance->setResolver($resolver = new \mock\atoum\atoum\asserter\resolver()),
                $this->calling($resolver)->getNamespaces = $namespaces = range(1, 5)
            )
            ->then
                ->array($this->testedInstance->getNamespaces())->isEqualTo($namespaces)
        ;
    }

    public function testSetLocale()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->object($this->testedInstance->setLocale($locale = new atoum\locale()))->isTestedInstance
                ->object($this->testedInstance->getLocale())->isIdenticalTo($locale)

                ->object($this->testedInstance->setLocale())->isTestedInstance
                ->object($this->testedInstance->getLocale())
                    ->isNotIdenticalTo($locale)
                    ->isEqualTo(new atoum\locale())
        ;
    }

    public function testSetResolver()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->object($this->testedInstance->setResolver($resolver = new asserter\resolver()))->isTestedInstance
                ->object($this->testedInstance->getResolver())->isIdenticalTo($resolver)

                ->object($this->testedInstance->setResolver())->isTestedInstance
                ->object($this->testedInstance->getResolver())
                    ->isEqualTo(new asserter\resolver())
                    ->isNotIdenticalTo($resolver)
        ;
    }

    public function testGetAsserterClass()
    {
        $this
            ->given($this->newTestedInstance->setResolver($resolver = new \mock\atoum\atoum\asserter\resolver()))

            ->if($this->calling($resolver)->resolve = null)
            ->then
                ->variable($this->testedInstance->getAsserterClass($asserter = uniqid()))->isNull()
                ->mock($resolver)->call('resolve')->withArguments($asserter)->once

            ->if($this->calling($resolver)->resolve = $class = uniqid())
            ->then
                ->string($this->testedInstance->getAsserterClass($asserter = uniqid()))->isEqualTo($class)
                ->mock($resolver)->call('resolve')->withArguments($asserter)->once
        ;
    }
}
