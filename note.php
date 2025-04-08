<?php
class Note{
    private $id;
    private $etudiant_nom;
    private $cours_nom;
    private $etudiant_id;
    private $cours_id;
    private $note;

    
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of etudiant_nom
     */
    public function getEtudiantNom()
    {
        return $this->etudiant_nom;
    }

    /**
     * Set the value of etudiant_nom
     */
    public function setEtudiantNom($etudiant_nom): self
    {
        $this->etudiant_nom = $etudiant_nom;

        return $this;
    }

    /**
     * Get the value of cours_nom
     */
    public function getCoursNom()
    {
        return $this->cours_nom;
    }

    /**
     * Set the value of cours_nom
     */
    public function setCoursNom($cours_nom): self
    {
        $this->cours_nom = $cours_nom;

        return $this;
    }

    /**
     * Get the value of etudiant_id
     */
    public function getEtudiantId()
    {
        return $this->etudiant_id;
    }

    /**
     * Set the value of etudiant_id
     */
    public function setEtudiantId($etudiant_id): self
    {
        $this->etudiant_id = $etudiant_id;

        return $this;
    }

    /**
     * Get the value of cours_id
     */
    public function getCoursId()
    {
        return $this->cours_id;
    }

    /**
     * Set the value of cours_id
     */
    public function setCoursId($cours_id): self
    {
        $this->cours_id = $cours_id;

        return $this;
    }

    /**
     * Get the value of note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     */
    public function setNote($note): self
    {
        $this->note = $note;

        return $this;
    }
}
?>