<?php

class Employee {
    private $id;
    private $name;
    private $position;

    public function __construct($id, $name, $position) {
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPosition() {
        return $this->position;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function save() {
        // Code to save the employee data to the database
    }

    public function delete() {
        // Code to delete the employee from the database
    }

    public static function findAll() {
        // Code to retrieve all employees from the database
    }

    public static function findById($id) {
        // Code to retrieve a specific employee by ID from the database
    }
}