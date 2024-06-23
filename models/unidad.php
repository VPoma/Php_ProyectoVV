<?Php

Class Unidad{
    private $id;
    private $unidad;
    private $descripcion;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getUnidad(){
        return $this->unidad;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function setId($id){
        $this->id = $id;
    }

    function setUnidad($unidad){
        $this->unidad = $this->db->real_escape_string($unidad);
        $this->unidad = $this->db->real_escape_string($unidad);
    }

    function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function getAll(){
        $unidad = $this->db->query("SELECT * FROM unidad");
        return $unidad;
    }

    public function save(){
        $sql = "INSERT INTO unidad VALUES(NULL, '{$this->getUnidad()}', '{$this->getDescripcion()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getone(){
        $unidad = $this->db->query("SELECT * FROM unidad WHERE id = {$this->getId()};");
        return $unidad->fetch_object();
    }

    public function delete(){
        $sql = "DELETE FROM unidad WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE unidad SET unidad = '{$this->getUnidad()}', descripcion = '{$this->getDescripcion()}' WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

}

?>