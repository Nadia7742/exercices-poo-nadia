<?php

class Mario
{

    public $prenom;
    public $vies = 3;
    public $pieces = 0;


    public function __construct($prenom)
    {
        $this->prenom = $prenom;
    }


    public function ramasserPiece()
    {
        $this->pieces++;
    }


    public function afficherStatut()
    {
        echo "Mario {$this->prenom} — Vies : {$this->vies} — Pièces : {$this->pieces}\n";
    }
}


$mario = new Mario("Mario");

$mario->ramasserPiece();
$mario->ramasserPiece();
$mario->ramasserPiece();

$mario->afficherStatut();
