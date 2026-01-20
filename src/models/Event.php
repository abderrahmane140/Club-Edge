<?php


namespace src\models;


class Event
{
    private int $id;
    private string $titre;
    private string $bio;
    private string $date;
    private string $lieu;
    private string $img;


    public function __construct($titre,$bio,$date,$lieu,$img,$id=null)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->bio = $bio;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->img = $img;
    }




//getters
    public function getId(){return $this->id;}
    public function getTitre(){return $this->titre;}
    public function getBio(){return $this->bio;}
    public function getDate(){return $this->date;}
    public function getLieu(){return $this->lieu;}
    public function getImg(){return $this->img;}





    //setters
    public function setId($id){$this->id=$id;}
    public function setTitre($titre){$this->titre=$titre;}
    public function setBio($bio){$this->bio=$bio;}
    public function setDate($date){$this->date=$date;}
    public function setLieu($lieu){$this->lieu=$lieu;}
    public function setImg($img){
        $this->img = $img;
    }




}