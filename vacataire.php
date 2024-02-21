<?php
// Inclusion de la classe "Personne"
// Including the "Personne" class
include "personne.php";

// Définition de la classe "Vacataire" qui hérite de "Personne"
// Definition of the "Vacataire" class that extends "Personne"
class Vacataire extends Personne
{
    private $diplome; // Diplôme du vacataire

    // Constructeur de la classe
    // Class constructor
    public function __construct($numero, $nom, $prenom, $heursup, $salaireHoraire, $diplome)
    {
        // Appel du constructeur de la classe parente avec les paramètres appropriés
        // Calling the constructor of the parent class with appropriate parameters
        parent::__construct($numero, $nom, $prenom, $heursup, $salaireHoraire);
        $this->diplome = $diplome;
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

    // Méthode pour calculer le salaire du vacataire
    // Method to calculate the salary of the vacataire
    public function calcSalaire()
    {
        // Assigner le salaire horaire en fonction du grade du diplôme
        // Assign the hourly wage based on the diploma grade
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
// $v1 = new Vacataire(120,"gahi",'said',20,40,"3eme grade");
// echo $v1->calcSalaire();
