<?php
class Continent {

    /**
     * numero du continent
     *
     * @var int
     */
    private $num;

    /**
     * libelle du continent
     *
     * @var string
     */
    private $libelle;

    /**
     * Get the value of num
     */
    public function getNum()
    {
        return $this->num;
    }
    
    /**
     * lit le libelle
     *
     * @return string
     */
    public function getLibelle() : string
    {
        return $this->libelle;
    }

    /**
     * ecrit dans le libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle( string $libelle) : self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Retourne l'ensemble des continents
     *
     * @return Continent[] tableau objet contient
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("Select * from continent");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Continent');
        $req->execute();
        $lesResultats=$req->fetchALL();
        return $lesResultats;
    }

    /**
     * Trouve un continent par son num
     *
     * @param integer $id numéro continent 
     * @return Continent objet continent trouver
     */
    public static function findById(int $id) :Continent
    {
        $req=MonPdo::getInstance()->prepare("Select * from continent where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Continent');
        $req->bindParam(':id', $id);
        $req->execute();
        $lesResultats=$req->fetch();
        return $lesResultats; 
    }

    /**
     * Permet d'ajouter un continent
     *
     * @param Continent $continent continent a ajouter 
     * @return integer resultat(1 si l'operation a réussi, 0 sinon)
     */
    public static function add(Continent $continent) :int
    {
        $req=MonPdo::getInstance()->prepare(" Insert into continent (libelle) value(:libelle)");
        $req->bindParam(':libelle', $continent->getLibelle());
        $lesResultats=$req->fetch();
        return $lesResultats;
    }

    /**
     * Permet de modifier un continent
     *
     * @param Continent $continent continent a modifier 
     * @return integer resultat(1 si l'operation a réussi, 0 sinon)
     */
    public static function update(Continent $continent) :int
    {
        $req=MonPdo::getInstance()->prepare(" update continent set libelle= :libelle where num= :num");
        $req->bindParam(':id', $continent->getNum());
        $req->bindParam(':libelle', $continent->getLibelle());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function delete(Continent $continent) :int
    {
        $req=MonPdo::getInstance()->prepare(" delete ifrom continent where num= :id");
        $req->bindParam(':libelle', $continent->getNum());
        $nb=$req->execute();
        return $nb;
    }
}