<?php

// Créer une classe produit avec les propriétés $nom, $prixHT et $stock. Ajoutez les 
// prixTTC($tva = 20) -> retourne le prix TTC selon la TVA passée en paramètre
// estDisponible() -> retourne true si le stock est supérieur à 0
// afficher() -> affiche le nom, le prix HT et si dsponible


class Produit
{
    public $nom;
    public $prixHT;
    public $stock;


    public function prixTTC($tva = 20)
    {
        return $this->prixHT * (1 + $tva / 100);
    }

    public function estDisponible()
    {
        return $this->stock > 0;              // ici le this fait comme un if 
    }

    public function afficher()
    {
        // echo "Produit " .  $this->nom . "\n";
        // echo "PrixHt " .  $this->prixHT . "\n";
        // echo "Stock " .  $this->stock . "\n";

        $dispo = $this->estDisponible() ? "✅ En stock" : "❌ Rupture";
        echo $this->nom . " - " . $this->prixHT  . "€ HT - " . $dispo . "\n";
    }
}

$produit = new Produit();
$produit->nom = "ballon";
$produit->prixHT = 50;
$produit->stock = 5;

echo $produit->prixTTC() . "\n";
echo $produit->prixTTC(5.5) . "€\n";
$produit->afficher();
