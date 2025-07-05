<?php

namespace Wesley0010012\TradutorGenetico\Entities;

abstract class AcidoNucleico
{
    public function __construct(
        protected array $basesHidrogenadas
    ) {}

    public function getBasesHidrogenadas(): array
    {
        return $this->basesHidrogenadas;
    }
}
