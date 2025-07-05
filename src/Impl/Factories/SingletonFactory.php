<?php

namespace Wesley0010012\TradutorGenetico\Impl\Factories;

abstract class SingletonFactory implements IFactory
{
    protected mixed $instance = null;

    public function make(mixed $input = null): mixed
    {
        $instance = $this->getInstance();

        if ($instance == null) {
            $instance = $this->buildInstance($input);
            $this->instance = $instance;
        }

        return $instance;
    }

    public abstract function buildInstance(mixed $input): mixed;

    protected function getInstance(): mixed
    {
        return $this->instance;
    }

    protected function setInstance(mixed $instance): void
    {
        $this->instance = $instance;
    }
}
