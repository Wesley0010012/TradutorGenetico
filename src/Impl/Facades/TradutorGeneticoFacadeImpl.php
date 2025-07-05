<?php

namespace Wesley0010012\TradutorGenetico\Impl\Facades;

use Wesley0010012\TradutorGenetico\Entities\DNA;
use Wesley0010012\TradutorGenetico\Entities\Proteina;
use Wesley0010012\TradutorGenetico\Entities\RNA;
use Wesley0010012\TradutorGenetico\Facades\TradutorGeneticoFacade;
use Wesley0010012\TradutorGenetico\Impl\Strategies\ConverterCadeiaEmAcidoNucleico;
use Wesley0010012\TradutorGenetico\Protocols\IStrategy;

class TradutorGeneticoFacadeImpl implements TradutorGeneticoFacade
{
    public function __construct(
        private IStrategy $converterDnaEmRna,
        private IStrategy $converterRnaEmDna,
        private IStrategy $converterRnaEmProteina,
        private IStrategy $converterCadeiaEmAcidoNucleico
    ) {}

    public function converterDNAEmRNA(DNA $dna): RNA
    {
        return $this->converterDnaEmRna->execute($dna);
    }

    public function converterRNAEmDNA(RNA $rna): DNA
    {
        return $this->converterRnaEmDna->execute($rna);
    }

    public function converterRNAEmProteina(RNA $rna): Proteina
    {
        return $this->converterRnaEmProteina->execute($rna);
    }

    public function converterDNATextoEmRNA(string $dnaTexto, string $separator = ""): RNA
    {
        $dna = $this->converterDNATexto($dnaTexto, $separator);

        return $this->converterDNAEmRNA($dna);
    }

    public function converterRNATextoEmDNA(string $rnaTexto, string $separator = ""): DNA
    {
        $rna = $this->converterRNATexto($rnaTexto, $separator);

        return $this->converterRNAEmDNA($rna);
    }

    public function converterRNATextoEmProteina(string $rnaTexto, string $separator = ""): Proteina
    {
        $rna = $this->converterRNATexto($rnaTexto, $separator);

        return $this->converterRnaEmProteina($rna);
    }

    public function converterDNATexto(string $dnaTexto, string $separator = ""): DNA
    {
        return $this->converterCadeiaEmAcidoNucleico->execute([
            ConverterCadeiaEmAcidoNucleico::CLASS_STRING => DNA::class,
            ConverterCadeiaEmAcidoNucleico::CADEIA_ENTRADA => $dnaTexto,
            ConverterCadeiaEmAcidoNucleico::SEPARATOR => $separator
        ]);
    }

    public function converterRNATexto(string $rnaTexto, string $separator = ""): RNA
    {
        return $this->converterCadeiaEmAcidoNucleico->execute([
            ConverterCadeiaEmAcidoNucleico::CLASS_STRING => RNA::class,
            ConverterCadeiaEmAcidoNucleico::CADEIA_ENTRADA => $rnaTexto,
            ConverterCadeiaEmAcidoNucleico::SEPARATOR => $separator
        ]);
    }
}
