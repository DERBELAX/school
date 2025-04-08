<?php
class Etudiant {
   private $id;
   private $nom;
   private $prenom;
   private $titre;
   private $age;
   private $passwd;
   private $email;
   private $statut;
   private $ville;
   
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
    * Get the value of nom
    */
   public function getNom()
   {
      return $this->nom;
   }

   /**
    * Set the value of nom
    */
   public function setNom($nom): self
   {
      $this->nom = $nom;

      return $this;
   }

   /**
    * Get the value of prenom
    */
   public function getPrenom()
   {
      return $this->prenom;
   }

   /**
    * Set the value of prenom
    */
   public function setPrenom($prenom): self
   {
      $this->prenom = $prenom;

      return $this;
   }

   /**
    * Get the value of titre
    */
   public function getTitre()
   {
      return $this->titre;
   }

   /**
    * Set the value of titre
    */
   public function setTitre($titre): self
   {
      $this->titre = $titre;

      return $this;
   }

   /**
    * Get the value of age
    */
   public function getAge()
   {
      return $this->age;
   }

   /**
    * Set the value of age
    */
   public function setAge($age): self
   {
      $this->age = $age;

      return $this;
   }

   /**
    * Get the value of passwd
    */
   public function getPasswd()
   {
      return $this->passwd;
   }

   /**
    * Set the value of passwd
    */
   public function setPasswd($passwd): self
   {
      $this->passwd = $passwd;

      return $this;
   }

   /**
    * Get the value of email
    */
   public function getEmail()
   {
      return $this->email;
   }

   /**
    * Set the value of email
    */
   public function setEmail($email): self
   {
      $this->email = $email;

      return $this;
   }

   /**
    * Get the value of statut
    */
   public function getStatut()
   {
      return $this->statut;
   }

   /**
    * Set the value of statut
    */
   public function setStatut($statut): self
   {
      $this->statut = $statut;

      return $this;
   }

   /**
    * Get the value of ville
    */
   public function getVille()
   {
      return $this->ville;
   }

   /**
    * Set the value of ville
    */
   public function setVille($ville): self
   {
      $this->ville = $ville;

      return $this;
   }

   public function getFullName() {
    return $this->nom." ".$this->prenom;
 }
}