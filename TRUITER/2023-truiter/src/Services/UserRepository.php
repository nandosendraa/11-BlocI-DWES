<?php

namespace App\Services;

use App\Registry;
use App\User;
use DateTime;

class UserRepository
{
    private DB $db;
    public function __construct()
    {
        $this->db = Registry::get("DB");
    }

    public function find(int $id): ?User
    {
        $stmt = $this->db->run("SELECT * FROM user WHERE id=:id", ["id" => $id]);
        $row = $stmt->fetch();

        if (empty($row))
            return null;

        $user = new User($row["username"], $row["name"]);
        $user->setCreatedAt(DateTime::createFromFormat("Y-m-d h:i:s", $row["created_at"]));
        $user->setId($row["id"]);
        return $user;
    }
    public function findByUsername(string $username): ?User
    {
        $stmt = $this->db->run("SELECT * FROM user WHERE username=:username", ["username" => $username]);
        $row = $stmt->fetch();

        if (empty($row))
            return null;

        $user = new User($row["username"], $row["name"]);
        $user->setCreatedAt(DateTime::createFromFormat("Y-m-d h:i:s", $row["created_at"]));
        $user->setId($row["id"]);
        return $user;
    }
    public function addUser(string $nom ,string $username,string $password,string $date,int $verified):void
    {
        $stmt = $this->db->run("INSERT INTO user (name, username, password, created_at, verified) VALUES (:name, :username, :password, :created_at, :verified)",
            ['name'=> $nom ,"username" => $username, "password" => $password, "created_at" => $date, "verified" => $verified]);
    }

    public function changeUser(string $username, int $id):void
    {
        $stmt = $this->db->run("UPDATE user SET username = :username WHERE id = :id",
            ["username" => $username, "id" => $id]);
    }

    public function changeName(string $name, int $id):void
    {
        $stmt = $this->db->run("UPDATE user SET name = :name WHERE id = :id",
            ["name" => $name, "id" => $id]);
    }

    public function delete($username):void
    {
        $stmt = $this->db->run("DELETE FROM `user` WHERE username LIKE :username",
            ["username" => $username]);
    }

}