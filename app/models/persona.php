<?php
class Persona {
    private $conn;
    public $id;
    public $nombre;
    public $direccion;
    public $telefono;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM persona";
        return $this->conn->query($query);
    }

    public function readOne() {
        $stmt = $this->conn->prepare("SELECT * FROM persona WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO persona (nombre, direccion, telefono) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->nombre, $this->direccion, $this->telefono);
        return $stmt->execute();
    }

    public function update() {
        $stmt = $this->conn->prepare("UPDATE persona SET nombre=?, direccion=?, telefono=? WHERE id=?");
        $stmt->bind_param("sssi", $this->nombre, $this->direccion, $this->telefono, $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $stmt = $this->conn->prepare("DELETE FROM persona WHERE id=?");
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}
?>