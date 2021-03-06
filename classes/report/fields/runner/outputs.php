<?php

namespace atoum\atoum\report\fields\runner;

use atoum\atoum\observable;
use atoum\atoum\report\field;
use atoum\atoum\runner;

abstract class outputs extends field
{
    protected $runner = null;

    public function __construct()
    {
        parent::__construct([runner::runStop]);
    }

    public function getRunner()
    {
        return $this->runner;
    }

    public function handleEvent($event, observable $observable)
    {
        if (parent::handleEvent($event, $observable) === false) {
            return false;
        } else {
            $this->runner = $observable;

            return true;
        }
    }
}
