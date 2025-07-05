<?php

namespace Wesley0010012\TradutorGenetico\Impl\Factories;

use Wesley0010012\TradutorGenetico\Impl\Facades\TradutorGeneticoFacadeImpl;
use Wesley0010012\TradutorGenetico\Impl\Strategies\ConverterCadeiaEmAcidoNucleico;
use Wesley0010012\TradutorGenetico\Impl\Strategies\ConverterDnaRna;
use Wesley0010012\TradutorGenetico\Impl\Strategies\ConverterRnaDna;
use Wesley0010012\TradutorGenetico\Impl\Strategies\ConverterRnaEmProteina;
use Wesley0010012\TradutorGenetico\Impl\Strategies\GerarBaseHidrogenada;
use Wesley0010012\TradutorGenetico\Impl\Strategies\IdentificarTipoBaseHidrogenada;
use Wesley0010012\TradutorGenetico\Impl\Strategies\InserirNomeProteina;

class TradutorGeneticoFactory extends SingletonFactory
{
    public function buildInstance(mixed $input): mixed
    {
        $converterDnaEmRna = new ConverterDnaRna();
        $converterRnaEmDna = new ConverterRnaDna();

        $inserirNomeProteina = new InserirNomeProteina();

        $converterRnaEmProteina = new ConverterRnaEmProteina($inserirNomeProteina);

        $identificarBaseHidrogenada = new IdentificarTipoBaseHidrogenada();

        $gerarBaseHidrogenada = new GerarBaseHidrogenada($identificarBaseHidrogenada);

        $converterCadeiaEmAcidoNucleico = new ConverterCadeiaEmAcidoNucleico($gerarBaseHidrogenada);

        return new TradutorGeneticoFacadeImpl($converterDnaEmRna, $converterRnaEmDna, $converterRnaEmProteina, $converterCadeiaEmAcidoNucleico);
    }
}
