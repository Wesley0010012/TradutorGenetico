<?php

namespace Wesley0010012\TradutorGenetico\Entities;

class Proteina
{
    public function __construct(
        private readonly array $aminoAcidos,
        private readonly RNA $rna,
        private string $nome = ""
    ) {}

    public function getAminoAcidos(): array
    {
        return $this->aminoAcidos;
    }

    public function getRna(): RNA
    {
        return $this->rna;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
}
