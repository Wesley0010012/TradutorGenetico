<?php

namespace Wesley0010012\TradutorGenetico\Impl\Strategies;

use Wesley0010012\TradutorGenetico\Entities\BaseHidrogenada;
use Wesley0010012\TradutorGenetico\Enums\TipoBaseHidrogenadaEnum;
use Wesley0010012\TradutorGenetico\Protocols\IStrategy;

class GerarBaseHidrogenada implements IStrategy
{
    public function __construct(
        private readonly IStrategy $identificarTipoBaseHidrogenada
    ) {}

    public function execute(mixed $input): mixed
    {
        $tipo = (fn($i): string => $i)($input);

        return new BaseHidrogenada(
            (fn($i): TipoBaseHidrogenadaEnum => $i)($this->identificarTipoBaseHidrogenada->execute($tipo))
        );
    }
}
