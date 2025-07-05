<?php

namespace Wesley0010012\TradutorGenetico\Impl\Strategies;

use Wesley0010012\TradutorGenetico\Entities\AminoAcido;
use Wesley0010012\TradutorGenetico\Entities\BaseHidrogenada;
use Wesley0010012\TradutorGenetico\Entities\Proteina;
use Wesley0010012\TradutorGenetico\Entities\RNA;
use Wesley0010012\TradutorGenetico\Enums\TipoAminoacidoEnum;
use Wesley0010012\TradutorGenetico\Enums\TipoBaseHidrogenadaEnum;
use Wesley0010012\TradutorGenetico\Protocols\IStrategy;

class ConverterRnaEmProteina implements IStrategy
{
    public const AMINO_ACIDOS = [
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::PHE,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::PHE,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::LEU,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::LEU,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::SER,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::SER,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::SER,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::SER,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::TYR,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::TYR,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::STOP,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::STOP,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::CYS,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::CYS,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::STOP,
        TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::TRP,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::LEU,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::LEU,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::LEU,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::LEU,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::PRO,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::PRO,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::PRO,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::PRO,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::HIS,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::HIS,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::GLN,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::GLN,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::ARG,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::ARG,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::ARG,
        TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::ARG,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::ILE,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::ILE,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::ILE,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::MET,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::THR,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::THR,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::THR,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::THR,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::ASN,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::ASN,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::LYS,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::LYS,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::SER,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::SER,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::ARG,
        TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::ARG,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::VAL,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::VAL,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::VAL,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::URACILA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::VAL,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::ALA,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::ALA,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::ALA,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::ALA,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::ASP,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::ASP,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::GLU,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::ADENINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::GLU,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::URACILA->value => TipoAminoacidoEnum::GLY,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::CITOSINA->value => TipoAminoacidoEnum::GLY,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::ADENINA->value => TipoAminoacidoEnum::GLY,
        TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::GUANINA->value . TipoBaseHidrogenadaEnum::GUANINA->value => TipoAminoacidoEnum::GLY,
    ];

    private const QUANTIDADE_BASES_MINIMA = 3;

    public function __construct(
        private readonly IStrategy $inserirNomeProteina
    ) {}

    public function execute(mixed $input): mixed
    {
        $rna = (fn($i): RNA => $i)($input);

        $basesHidrogenadas = $rna->getBasesHidrogenadas();

        $aminoAcidos = [];

        foreach (array_chunk($basesHidrogenadas, 3) as $grupo) {
            if (count($grupo) < self::QUANTIDADE_BASES_MINIMA) {
                break;
            }

            $codigo = implode("", array_map(fn(BaseHidrogenada $i) => $i->getIdentificador()->value, $grupo));
            $tipo = self::AMINO_ACIDOS[$codigo] ?? TipoAminoacidoEnum::ND;

            $aminoAcidos[] = new AminoAcido($grupo, $tipo);
        }

        $proteina = new Proteina($aminoAcidos, $rna);

        $this->inserirNomeProteina->execute([Proteina::class => $proteina]);

        return $proteina;
    }
}
