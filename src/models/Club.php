<?php

class Club {
    public $id;
    public $name;
    public $description;
    public $president_id;
    public $created_at;

    public function __construct($id = null, $name = null, $description = null, $president_id = null, $created_at = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->president_id = $president_id;
        $this->created_at = $created_at;
    }
}
