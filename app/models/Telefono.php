<?php
class Telefono {
    private $id;
    private $numero;
    private $tipo;
    private $persona_id;

    public function __construct($id, $numero, $tipo, $persona_id) {
        $this->id = $id;
        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->persona_id = $persona_id;
    }

    // Getters y setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNumero() { return $this->numero; }
    public function setNumero($numero) { $this->numero = $numero; }

    public function getTipo() { return $this->tipo; }
    public function setTipo($tipo) { $this->tipo = $tipo; }

    public function getPersonaId() { return $this->persona_id; }
    public function setPersonaId($persona_id) { $this->persona_id = $persona_id; }
}
?>
