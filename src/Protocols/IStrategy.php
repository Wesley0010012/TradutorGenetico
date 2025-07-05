<?php

namespace Wesley0010012\TradutorGenetico\Protocols;

interface IStrategy
{
    public function execute(mixed $input): mixed;
}
