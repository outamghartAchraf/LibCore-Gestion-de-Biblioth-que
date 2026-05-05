<?php
include_once __DIR__ . "/../../config/db.php";

class Library
{
    public $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }



}

