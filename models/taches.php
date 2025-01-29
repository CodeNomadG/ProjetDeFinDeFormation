<?php
class Tache
{
    private $id_tache;
    private $id_salariees;
    private $titre;
    private $description;
    private $date_creation;
    private $date_echeance;
    private $statut;

    public function __construct(
        ?int $id_tache = 1,
        ?int $id_salariees = null,
        string $titre = "",
        string $description = "",
        string $date_creation = null,
        string $date_echeance = null,
        string $statut = ""
    ) {
        $this->id_tache = $id_tache ?? 1;
        $this->id_salariees = $id_salariees;
        $this->titre = $titre;
        $this->description = $description;
        $this->date_creation = $date_creation;
        $this->date_echeance = $date_echeance;
        $this->statut = $statut;
    }

    public function getIdTache(): ?int
    {
        return $this->id_tache;
    }

    public function setIdTache(int $id_tache): void
    {
        $this->id_tache = $id_tache;
    }

    public function getIdSalariees(): ?int
    {
        return $this->id_salariees;
    }

    public function setIdSalariees(int $id_salariees): void
    {
        $this->id_salariees = $id_salariees;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDateCreation(): ?string
    {
        return $this->date_creation;
    }

    public function setDateCreation(string $date_creation): void
    {
        $this->date_creation = $date_creation;
    }

    public function getDateEcheance(): ?string
    {
        return $this->date_echeance;
    }

    public function setDateEcheance(string $date_echeance): void
    {
        $this->date_echeance = $date_echeance;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }
}
