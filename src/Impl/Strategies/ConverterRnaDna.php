<?php

namespace Wesley0010012\TradutorGenetico\Impl\Strategies;

use Wesley0010012\TradutorGenetico\Entities\BaseHidrogenada;
use Wesley0010012\TradutorGenetico\Entities\DNA;
use Wesley0010012\TradutorGenetico\Entities\RNA;
use Wesley0010012\TradutorGenetico\Enums\TipoBaseHidrogenadaEnum;
use Wesley0010012\TradutorGenetico\Protocols\IStrategy;

class ConverterRnaDna implements IStrategy
{
    public function execute(mixed $input): mixed
    {
        $acidoNucleico = (fn($i): DNA => $i)($input);

        $basesHidrogenadasConvertidas = array_map(function (BaseHidrogenada $base) {
            if ($base->getIdentificador() == TipoBaseHidrogenadaEnum::URACILA) {
                return new BaseHidrogenada(TipoBaseHidrogenadaEnum::TIMINA);
            }

            return $base;
        }, $acidoNucleico->getBasesHidrogenadas());

        return new RNA($basesHidrogenadasConvertidas);
    }
}
