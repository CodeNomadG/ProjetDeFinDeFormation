<?php

// Salariees.php

// Définition de la classe Salriées
class Salariees
{
    // Propriétés de la classe
    private int $idSalariees;
    private string $pseudo;
    private string $email;
    private string $mdp;
    private string $mobile;
    private string $poste;
    private string $cp;
    private string $ville;
    private string $id_ville;



    // Constructeur de la classe Salariées
    public function __construct(
        ?int $idSalariees = 1,
        ?string $pseudo = "",
        ?string $email = "",
        ?string $mobile = "",
        ?string $mdp = "", // Changed here
        ?string $poste = "",
        ?string $cp = "",
        ?string $ville = ""

    ) {
        // Initialisation des propriétés avec les valeurs fournies
        $this->idSalariees = $idSalariees ?? 1;
        $this->pseudo = $pseudo ?? "";
        $this->email = $email ?? "";
        $this->mobile = $mobile ?? "";
        $this->mdp = $mdp ?? ""; // Corrected here
        $this->poste = $poste ?? "";
        $this->cp = $cp ?? "";
        $this->ville = $ville ?? "";
        $this->id_ville = $id_ville ?? "";
    }

    /**
     * Get the value of idSalariees
     */
    // Méthode pour obtenir l'ID du salariees
    public function getIdSalariees()
    {
        return $this->idSalariees;
    }

    /**
     * Set the value of idSalariees
     *
     * @return  self
     */
    // Méthode pour définir l'ID du salariees
    public function setIdSalariees($idSalariees)
    {
        $this->idSalariees = $idSalariees;

        return $this;
    }

    /**
     * Get the value of Pseudo
     */
    // Méthode pour obtenir Pseudo
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of Pseudo
     *
     * @return  self
     */
    // Méthode pour définir Pseudo
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of Email
     */
    // Méthode pour obtenir l'Email
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */
    // Méthode pour définir l'Email
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of Mdp
     */
    // Méthode pour obtenir le mdp
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of Mdp
     *
     * @return  self
     */
    // Méthode pour définir le mdp
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get the value of Mobile
     */
    // Méthode pour obtenir le Mobile
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */
    // Méthode pour définir l'Email
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }




    /**
     * Get the value of Poste
     */
    // Méthode pour obtenir le poste
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set the value of poste
     *
     * @return  self
     */
    // Méthode pour définir le Poste
    public function setPost($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get the value of Cp
     */
    // Méthode pour obtenir le Cp
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of Cp
     *
     * @return  self
     */
    // Méthode pour définir le Cp
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get the value of Ville
     */
    // Méthode pour obtenir la Ville
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of Ville
     *
     * @return  self
     */
    // Méthode pour définir la ville
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of Ville
     */
    // Méthode pour obtenir la Ville
    public function getIdVille()
    {
        return $this->id_ville;
    }

    /**
     * Set the value of Ville
     *
     * @return  self
     */
    // Méthode pour définir la ville
    public function setIdVille($id_ville)
    {
        $this->id_ville = $id_ville;

        return $this;
    }
}
