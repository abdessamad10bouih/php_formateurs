<?php

// Abstract class definition for "Personne"
abstract class Personne
{
    // Protected class properties
    protected $numero;          // Person's number
    protected $nom;             // Person's last name
    protected $prenom;          // Person's first name
    protected $heursup;         // Person's overtime hours
    protected $salaireHoraire;  // Person's hourly wage

    // Class constructor
    public function __construct($numero, $nom, $prenom, $heursup, $salaireHoraire)
    {
        // Initialize properties with provided values
        $this->numero = $numero;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->heursup = $heursup;
        $this->salaireHoraire = $salaireHoraire;
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

    // Magic method to get a string representation of the object
    public function __toString()
    {
        return $this->numero . '-' . $this->nom  . ' ' . $this->prenom;
    }

    // Abstract method to calculate the salary (must be implemented in child classes)
    abstract public function calcSalaire();
}
