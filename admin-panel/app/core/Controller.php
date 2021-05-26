<?php

namespace Core;

class Controller
{
    protected $db;

    public function __construct()
    {
        if (!$this->db) {
            $this->db = new DB();
        }
    }
}
