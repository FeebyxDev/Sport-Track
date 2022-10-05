<?php
class Utilisateur {
    private int $id;
    private string $mdp;
    private string $mail;
    private string $nom;
    private string $prenom;
    private string $date_de_naissance;
    private string $sexe;
    private int $poids;
    private int $taille;

    public function  __construct() { 
    }

    public function init($n, $p, $g, $m, $d, $w, $s, $pass) {
        $this->nom = $n;
        $this->prenom = $p;
        $this->sexe = $g;
        $this->mail = $m;
        $this->date_de_naissance = $d;
        $this->poids = $w;
        $this->taille = $s;
        $this->mdp = $pass;
    }

    public function getID(): string { return $this->id; }
    public function getMdp(): string { return $this->mdp; }
    public function getMail(): string { return $this->mail; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getDate(): string { return $this->date_de_naissance; }
    public function getSexe(): string { return $this->sexe; }
    public function getPoids(): string { return $this->poids; }
    public function getTaille(): string { return $this->taille; }

    public function comparePass($pass): bool { 
        return $this->mdp == md5($pass); 
    }

    public function setMdp($pass): void { $this->mdp = md5($pass); }
    public function setMail($m): void { $this->mail = $m; }
    public function setNom($n): void { $this->nom = $n; }
    public function setPrenom($p): void { $this->prenom = $p; }
    public function setDate($d): void { $this->date_de_naissance = $d; }
    public function setSexe($s): void { $this->sexe = $s; }
    public function setPoids($p): void { $this->poids = $p; }
    public function setTaille($t): void { $this->taille = $t; }

    public function  __toString(): string {
        return $this->nom . ' ' . $this->prenom . ' ' . $this->mail . ' ' . $this->date_de_naissance . ' ' . $this->sexe . ' ' . $this->poids . ' ' . $this->taille;
    }


    public function removeUser() {
        $actDAO = ActivityDAO::getInstance();
        $activities = $actDAO->findAll($this->id, null);
        foreach ($activities as $act) {
            $act->removeActivity();
        }
        $userDAO = UtilisateurDAO::getInstance();
        $userDAO->delete($this);
    }

}
?>