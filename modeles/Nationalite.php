<?php
class Nationalite {

    /**
     * numero du Nationalité
     *
     * @var int
     */
    private $num;

    /**
     * libelle du Nationalité
     *
     * @var string
     */
    private $libelle;

    /**
     * num Nationalité (clé e=étrangère) relié à num de Nationalité
     *
     * @var int
     */
    private $numContinent;

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
     * renvoie l'objet continent associé
     *
     * @return Continent
     */
    public function getNumContinent() : Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * Set the value of numContinent
     * 
     * @return self
     */
    public function setNumContinent(Continent $continent) : self
    {
        $this->numContinent = $numContinent->getNum();

        return $this;
    }

    /**
     * Retourne l'ensemble des Nationalité
     *
     * @return Nationalité[] tableau objet Nationalité
     */
    public static function finAll() :array
    {
        $req=MonPdo::getInstance()->prepare("Select n.num as numero, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats=$req->fetchALL();
        return $lesResltats;
    }

    /**
     * Trouve un Nationalité par son num
     *
     * @param integer $id numéro Nationalité 
     * @return Nationalité objet Nationalité trouver
     */
    public static function findById(int $id) :Nationalité
    {
        $req=MonPdo::getInstance()->prepare("Select * from Nationalité where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_LATE, 'Nationalité');
        $req->bindParam(':id', $id);
        $req->execute();
        $leResultat=$req->fetch();
        return $lesResltats; 
    }

    /**
     * Permet d'ajouter un Nationalité
     *
     * @param Nationalité $Nationalité Nationalité a ajouter 
     * @return integer resultat(1 si l'operation a réussi, 0 sinon)
     */
    public static function add(Nationalité $Nationalité) :int
    {
        $req=MonPdo::getInstance()->prepare(" Insert into Nationalité (libelle, numContinent) value(:libelle, :numContinent)");
        $req->bindParam(':libelle', $nationalité->getLibelle());
        $req->bindParam(':numContinent', $nationalité->numContinent());
        $nb=$req->execute();
        return $lesResltats;
    }

    /**
     * Permet de modifier un Nationalité
     *
     * @param Nationalité $Nationalité Nationalité a modifier 
     * @return integer resultat(1 si l'operation a réussi, 0 sinon)
     */
    public static function update(Nationalité $Nationalité) :int
    {
        $req=MonPdo::getInstance()->prepare(" update Nationalité set libelle= :libelle, numContinent= :numContinent where num= :num");
        $req->bindParam(':id', $nationalité->getNum());
        $req->bindParam(':libelle', $nationalité->getLibelle());
        $req->bindParam(':numContinent', $nationalité->numContinent());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * Permet de supprimer un Nationalité
     *
     * @param Nationalité $Nationalité
     * @return integer
     */
    public static function delete(Nationalité $Nationalité) :int
    {
        $req=MonPdo::getInstance()->prepare(" delete ifrom Nationalité where num= :id");
        $req->bindParam(':id', $nationalité->getNum());
        $nb=$req->execute();
        return $nb;
    }
}