<?php


class Tache

{
    private int $idTache;
    private int $idSalariees;
    private string $titre;

    public function __construct(int $idTache = 0, int $idSalariees = 0, string $titre = "")
    {
        $this->idTache = $idTache;
        $this->idSalariees = $idSalariees;
        $this->titre = $titre;
    }

    public function setIdTache(int $idTache): void
    {
        $this->idTache = $idTache;
    }

    public function getIdTache(): int
    {
        return $this->idTache;
    }

    public function setIdSalariees(int $idSalariees): void
    {
        $this->idSalariees = $idSalariees;
    }

    public function getIdsalariees(): int
    {
        return $this->idSalariees;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }
}
