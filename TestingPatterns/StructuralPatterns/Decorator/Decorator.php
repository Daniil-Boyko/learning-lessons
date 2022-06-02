<?php

// new different functions to the main object

namespace testingPatterns\DecoratorPattern;

interface ImplementComponent
{
    public function decorate(): string;
}

class BaseComponent implements ImplementComponent
{
    public function decorate(): string
    {
        // TODO: Implement decorate() method.
        return 'INIT_COMPONENT';
    }
}

class Decorator implements ImplementComponent
{
    public ImplementComponent $component;

    public function __construct(ImplementComponent $component)
    {
        $this->component = $component;
    }

    public function decorate(): string
    {
        // TODO: Implement decorate() method.
        return $this->component->decorate();
    }
}

class Decorator1 extends Decorator
{
    public function decorate(): string
    {
        return 'DECORATOR_1(' . parent::decorate() . ')'; // TODO: Change the autogenerated stub
    }
}

class Decorator2 extends Decorator
{
    public function decorate(): string
    {
        return 'DECORATOR_2(' . parent::decorate() . ')'; // TODO: Change the autogenerated stub
    }
}

function clientCode(ImplementComponent $component): void
{
    echo $component->decorate() . PHP_EOL;
}

$baseComponent = new BaseComponent();
clientCode($baseComponent);

$decorator_1 = new Decorator1($baseComponent);
clientCode($decorator_1);

$decorator_2 = new Decorator2($decorator_1);
clientCode($decorator_2);