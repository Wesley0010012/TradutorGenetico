<?php

namespace Wesley0010012\TradutorGenetico\Entities;

use DomainException;
use Wesley0010012\TradutorGenetico\Enums\TipoAminoacidoEnum;

class AminoAcido
{
    public function __construct(
        private array $basesHidrogenadas,
        private TipoAminoacidoEnum $tipo
    ) {
        if (count($this->basesHidrogenadas) != 3) {
            throw new DomainException("quantidade de bases hidrogenadas inválida. Deve contér 3 unidades");
        }
    }

    public function getBasesHidrogenadas(): array
    {
        return $this->basesHidrogenadas;
    }

    public function getTipo(): TipoAminoacidoEnum
    {
        return $this->tipo;
    }
}
