<?php

namespace Wesley0010012\TradutorGenetico\Impl\Strategies;

use Wesley0010012\TradutorGenetico\Entities\AminoAcido;
use Wesley0010012\TradutorGenetico\Entities\Proteina;
use Wesley0010012\TradutorGenetico\Protocols\IStrategy;

class InserirNomeProteina implements IStrategy
{
    public const DEFAULT_SEPARATOR = '-';

    public const SEPARATOR = 'SEPARATOR';

    public function execute(mixed $input): mixed
    {
        $data = (fn($i): array => $i)($input);

        $proteina = (fn($i): Proteina => $i)($data[Proteina::class]);

        $separator = (fn($i): string => $i)($data[self::SEPARATOR] ?? self::DEFAULT_SEPARATOR);

        $proteina->setNome(implode($separator, array_map(fn(AminoAcido $aminoAcido) => $aminoAcido->getTipo()->value, $proteina->getAminoAcidos())));

        return null;
    }
}
