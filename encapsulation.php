<?php
class Mario
{
    private string $prenom;
    private int    $vies   = 3;
    private int    $pieces = 0;

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
            echo "⭐ Déjà au maximum de vies (5) !\n";
            return;
        }
        $this->vies++;
        echo "❤️  1UP ! Tu as maintenant {$this->vies} vie(s).\n";
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
        echo "🍄 {$this->prenom} — ❤️ Vies : {$this->vies} — 🪙 Pièces : {$this->pieces}\n";
    }
}

// --- Test ---
$mario = new Mario('Mario');
$mario->ramasserPieces(95);
$mario->ramasserPieces(10); // → dépasse 100 → +1 vie
$mario->perdreVie();
$mario->perdreVie();
$mario->perdreVie();
$mario->perdreVie(); // Game Over !
$mario->afficherStatut();
