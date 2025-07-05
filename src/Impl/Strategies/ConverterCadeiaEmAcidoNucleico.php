<?php

namespace Wesley0010012\TradutorGenetico\Impl\Strategies;

use Wesley0010012\TradutorGenetico\Protocols\IStrategy;

class ConverterCadeiaEmAcidoNucleico implements IStrategy
{
    public const CLASS_STRING = 'CLASS_STRING';
    public const CADEIA_ENTRADA = 'CADEIA_STRING';
    public const SEPARATOR = 'SEPARATOR';
    public const DEFAULT_SEPARATOR = "";

    public function __construct(
        private readonly IStrategy $gerarBaseHidrogenada
    ) {}

    public function execute(mixed $input): mixed
    {
        $data = (fn($i): array => $i)($input);

        $classString = (fn($i): string => $i)($data[self::CLASS_STRING]);

        $cadeiaEntrada = (fn($i): string => $i)($data[self::CADEIA_ENTRADA]);

        $separator = (fn($i): string => $i)($data[self::SEPARATOR] ?? self::DEFAULT_SEPARATOR);

        $basesHidrogenadas = array_map(fn(string $base) => $this->gerarBaseHidrogenada->execute($base), $separator ? explode($separator, $cadeiaEntrada) : str_split($cadeiaEntrada));

        return new $classString($basesHidrogenadas);
    }
}
