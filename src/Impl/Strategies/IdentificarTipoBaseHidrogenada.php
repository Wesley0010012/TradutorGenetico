<?php

namespace Wesley0010012\TradutorGenetico\Impl\Strategies;

use DomainException;
use Wesley0010012\TradutorGenetico\Enums\TipoBaseHidrogenadaEnum;
use Wesley0010012\TradutorGenetico\Protocols\IStrategy;

class IdentificarTipoBaseHidrogenada implements IStrategy
{
    public function execute(mixed $input): mixed
    {
        $tipoBase = (fn($i): string => $i)($input);

        $baseHidrogenada = TipoBaseHidrogenadaEnum::tryFrom($tipoBase);

        if (!$baseHidrogenada) {
            throw new DomainException("Tipo de Base Hidrogenada inválida: $tipoBase");
        }

        return $baseHidrogenada;
    }
}
