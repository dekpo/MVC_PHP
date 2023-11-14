<?php
require_once("./services/class/Database.php");

class User
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAll($nb=null)
    {
        $limit = !is_null($nb) ? "LIMIT " . $nb : "";
        $pictures = [];
        $pictures = $this->db->selectAll("SELECT * from picture ORDER BY id DESC ". $limit);
        return $pictures;
    }

    public function getOneByEmail($email=null)
    {
        $whereEmail = !is_null($email) ? "WHERE email=?" : "";
        $user = [];
        $user = $this->db->select("SELECT * from user ". $whereEmail. "LIMIT 1",[$email]);
        return $user;
    }
}