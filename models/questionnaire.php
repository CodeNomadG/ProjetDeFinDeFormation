<?php
class Questionnaire
{
    // Propriétés privées représentant les réponses au questionnaire et l'identifiant du salarié
    private int $id_questionnaire;
    private string $q1;
    private string $q2;
    private string $q3;
    private string $q4;
    private string $id_salariees;

    // Constructeur de la classe
    public function __construct(
        ?int $id_questionnaire = 1,
        ?string $q1 = "",
        ?string $q2 = "",
        ?string $q3 = "",
        ?string $q4 = "",
        ?string $id_salariees = ""
    ) {
        // Initialisation des propriétés avec les valeurs passées en paramètres
        $this->id_questionnaire = $id_questionnaire ?? 1;
        $this->q1 = $q1 ?? "";
        $this->q2 = $q2 ?? "";
        $this->q3 = $q3 ?? "";
        $this->q4 = $q4 ?? "";
        $this->id_salariees = $id_salariees ?? "";
    }


    // Méthodes pour obtenir et définir les réponses aux questions du questionnaire (q1, q2, q3, q4)

    // Méthode pour obtenir l'ID du salariees
    public function getIdQuestionnaire()
    {
        return $this->id_questionnaire;
    }

    /**
     * Set the value of idSalariees
     *
     * @return  self
     */
    // Méthode pour définir l'ID du salariees
    public function setIdQuestionnaire($id_questionnaire)
    {
        $this->id_questionnaire = $id_questionnaire;

        return $this;
    }



    public function getQ1()
    {
        return $this->q1;
    }

    public function setQ1($q1)
    {
        $this->q1 = $q1;
    }

    public function getQ2()
    {
        return $this->q2;
    }

    public function setQ2($q2)
    {
        $this->q2 = $q2;
    }

    public function getQ3()
    {
        return $this->q3;
    }

    public function setQ3($q3)
    {
        $this->q3 = $q3;
    }

    public function getQ4()
    {
        return $this->q4;
    }

    public function setQ4($q4)
    {
        $this->q4 = $q4;
    }

    // Méthodes pour obtenir et définir l'identifiant du salarié (id_salariees)
    public function getIdSalariees()
    {
        return $this->id_salariees;
    }

    public function setIdSalariees($id_salariees)
    {
        $this->id_salariees = $id_salariees;
    }
}
