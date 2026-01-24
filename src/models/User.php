<?php

namespace Src\models;
 class  User{

    protected int $id;
    protected string $name;
    protected string $email;
    protected string $password;
    protected string $role;

    public function __construct(string $name,string $email,string $password,string $role,?int $id =null){

        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function getRole(): string { return $this->role; }
    public function getPassword(): string {return $this->password; }


    public function setId(int $id) { $this->id = $id; }
    public function setName(string $name) { $this->name = $name; }
    public function setEmail(string $email) { $this->email = $email; }
    public function setPassword(string $password) { $this->password = $password; }



}
