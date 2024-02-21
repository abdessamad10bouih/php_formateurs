<?php
// Inclusion de la classe "Personne"
// Including the "Personne" class
include "personne.php";

// Définition de la classe "Formateur" qui hérite de "Personne"
// Definition of the "Formateur" class that extends "Personne"
class Formateur extends Personne {
    private $SalaireFix; // Salaire fixe du formateur
    private $Niveau;     // Niveau du formateur

    // Constructeur de la classe
    // Class constructor
    public function __construct($numero, $nom, $prenom, $heursup, $salaireHoraire, $SalaireFix, $Niveau) {
        // Appel du constructeur de la classe parente avec les paramètres appropriés
        // Calling the constructor of the parent class with appropriate parameters
        parent::__construct($numero, $nom, $prenom, $heursup, $salaireHoraire);
        $this->SalaireFix = $SalaireFix;
        $this->Niveau = $Niveau;
    }

    // Magic method to get the value of a property
    public function __get($attr)
    {
        // Check the existence of the property and return its value
        return property_exists($this, $attr) ? $this->$attr : null;
    }

    // Magic method to set the value of a property
    public function __set($attr, $value)
    {
        // Check the existence of the property and set its value
        if (property_exists($this, $attr)) {
            $this->$attr = $value;
        }
    }

    // Méthode pour calculer le salaire du formateur
    // Method to calculate the salary of the formateur
    public function calcSalaire(){
        // Assigner le salaire horaire en fonction du grade du diplôme (Note: diplome property is not defined in Formateur class)
        // Assign the hourly wage based on the diploma grade (Note: diplome property is not defined in Formateur class)
        if ($this->diplome == "1er grade") {
            $this->salaireHoraire = 120;
        } elseif ($this->diplome == "2eme grade") {
            $this->salaireHoraire = 90;
        } elseif ($this->diplome == "3eme grade") {
            $this->salaireHoraire = 60;
        } else {
            $this->salaireHoraire = 40;
        }

        // Calculer le salaire total en fonction des heures supplémentaires
        // Calculate the total salary based on overtime hours
        $salireTotal = $this->salaireHoraire * $this->heursup;
        return $salireTotal;
    }
}

// Test unitaire commenté
// $f1 = new Formateur(120,"badr",'koton',20,40,6000,"3eme Grade");
// echo $f1->SalaireFix;
