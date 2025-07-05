<?php

namespace Wesley0010012\TradutorGenetico\Entities;

use Wesley0010012\TradutorGenetico\Enums\TipoBaseHidrogenadaEnum;

class BaseHidrogenada
{
    public function __construct(
        private readonly TipoBaseHidrogenadaEnum $identificador
    ) {}

    public function getIdentificador(): TipoBaseHidrogenadaEnum
    {
        return $this->identificador;
    }
}
