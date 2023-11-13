<?php
require_once("./services/class/Database.php");

class Picture
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAll($nb=null)
    {
        $limit = !is_null($nb) ? "LIMIT " . $nb : "";
        $pictures = [];
        $pictures = $this->db->query("SELECT * from picture ORDER BY id DESC ". $limit);
        return $pictures;
    }
}
