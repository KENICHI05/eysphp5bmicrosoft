<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Juan Bedoya modifico el 2024-06-15
require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/eysphp/app/models/Persona.php';

class PersonaController {
    private $persona;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->persona = new Persona($this->db);
    }

    // Mostrar personas
    public function index() {
        $personas = $this->persona->read();
        require_once '../app/views/persona/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre'], $_POST['direccion'], $_POST['telefono'])) {
                $this->persona->nombre = $_POST['nombre'];
                $this->persona->direccion = $_POST['direccion'];
                $this->persona->telefono = $_POST['telefono'];

                if ($this->persona->create()) {
                    echo "Persona creada exitosamente";
                } else {
                    echo "Error al crear persona";
                }
            } else {
                echo "Faltan datos";
            }
        } else {
            echo "Método incorrecto";
        }
        die();
    }

    public function edit($id) {
        $this->persona->id = $id;
        $persona = $this->persona->readOne();

        if (!$persona) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/persona/edit.php';
    }

    public function eliminar($id) {
        $this->persona->id = $id;
        $persona = $this->persona->readOne();

        if (!$persona) {
            die("Error: No se encontró el registro.");
        }

        require_once '../app/views/persona/delete.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'])) {
                $this->persona->id = $_POST['id'];
                $this->persona->nombre = $_POST['nombre'];
                $this->persona->direccion = $_POST['direccion'];
                $this->persona->telefono = $_POST['telefono'];

                if ($this->persona->update()) {
                    echo "Persona actualizada";
                } else {
                    echo "Error al actualizar";
                }
            } else {
                echo "Faltan datos";
            }
        } else {
            echo "Método incorrecto";
        }
        die();
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                $this->persona->id = $_POST['id'];

                if ($this->persona->delete()) {
                    echo "Persona eliminada";
                } else {
                    echo "Error al eliminar";
                }
            } else {
                echo "Faltan datos";
            }
        } else {
            echo "Método incorrecto";
        }
        die();
    }
}

// Manejo de acciones
if (isset($_GET['action'])) {
    $controller = new PersonaController();

    switch ($_GET['action']) {
        case 'create':
            $controller->create();
            break;
        case 'update':
            $controller->update();
            break;
        case 'delete':
            $controller->delete();
            break;
        default:
            echo "Acción no válida.";
            break;
    }
} else {
    echo "No se especificó ninguna acción.";
}
?>