<?php

namespace Wesley0010012\TradutorGenetico\Facades;

use Wesley0010012\TradutorGenetico\Entities\DNA;
use Wesley0010012\TradutorGenetico\Entities\Proteina;
use Wesley0010012\TradutorGenetico\Entities\RNA;

interface TradutorGeneticoFacade
{
    public function converterDNAEmRNA(DNA $dna): RNA;
    public function converterRNAEmDNA(RNA $rna): DNA;
    public function converterRNAEmProteina(RNA $rna): Proteina;

    public function converterDNATextoEmRNA(string $dnaTexto, string $separator = ""): RNA;
    public function converterRNATextoEmDNA(string $rnaTexto, string $separator = ""): DNA;
    public function converterRNATextoEmProteina(string $rnaTexto, string $separator = ""): Proteina;

    public function converterDNATexto(string $dnaTexto, string $separator = ""): DNA;
    public function converterRNATexto(string $rnaTexto, string $separator = ""): RNA;
}
