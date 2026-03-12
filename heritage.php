<?php
class Personnage
{
    protected string $prenom;
    protected int $vies = 3;
    protected int $pieces = 0;

    public function __construct(string $prenom)
    {
        $this->prenom = $prenom;
    }

    // === GETTERS ===
    public function getPrenom(): string
    {
        return $this->prenom;
    }
    public function getVies(): int
    {
        return $this->vies;
    }
    public function getPieces(): int
    {
        return $this->pieces;
    }

    // === PERDRE UNE VIE ===
    public function perdreVie(): void
    {
        if ($this->vies <= 0) {
            echo "💀 Game Over ! Plus de vies restantes.\n";
            return;
        }
        $this->vies--;
        echo "💔 Aïe ! Il reste {$this->vies} vie(s).\n";
    }

    // === GAGNER UNE VIE (max 5) ===
    public function gagnerVie(): void
    {
        if ($this->vies >= 5) {
            echo "⭐ Déjà au maximum de vies (5) !\n <br><br>";
            return;
        }
        $this->vies++;
        echo "❤️ 1UP ! Tu as maintenant {$this->vies} vie(s).\n <br><br>";
    }

    // === RAMASSER DES PIÈCES ===
    public function ramasserPieces(int $nb): void
    {
        $this->pieces += $nb;

        // Chaque tranche de 100 pièces = 1 vie bonus
        while ($this->pieces >= 100) {
            $this->pieces -= 100;
            echo "🪙 100 pièces ! Bonus vie !\n";
            $this->gagnerVie();
        }
    }

    public function afficherStatut(): void
    {
        echo "🍄 {$this->prenom} — ❤️ Vies : {$this->vies} — 🪙 Pièces : {$this->pieces}\n<br><br>";
    }
}

class Mario extends Personnage
{

    public function __construct($prenom)
    {
        parent::__construct($prenom);
    }

    public function superSaut()
    {
        echo $this->prenom . " fait un super saut !<br><br>";
    }
}

class Luigi extends Personnage
{
    public function __construct($prenom)
    {
        parent::__construct($prenom);
    }

    public function aspirerFantome()
    {
        echo $this->prenom . " aspire un fantôme avec le Poltergust !<br><br>";
    }
}
// --- Test ---
$mario = new Mario("Mario");
$mario->ramasserPieces(120);
$mario->afficherStatut();
$mario->gagnerVie();
$mario->superSaut();
echo "<br><br>";
$luigi = new Luigi("Luigi");
$luigi->ramasserPieces(150);
$luigi->afficherStatut();
$luigi->gagnerVie();
$luigi->aspirerFantome();
