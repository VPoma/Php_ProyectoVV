<?Php

Class Camara{
    private $id;
    private $camara;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getCamara(){
        return $this->camara;
    }

    function setId($id){
        $this->id = $id;
    }

    function setCamara($camara){
        $this->camara = $this->db->real_escape_string($camara);
    }

    public function getAll(){
        $camaras = $this->db->query("SELECT * FROM camara ORDER BY id DESC;");
        return $camaras;
    }

    public function save(){
        $sql = "INSERT INTO camara VALUES(NULL, '{$this->getCamara()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getOne(){
        $camara = $this->db->query("SELECT * FROM camara WHERE id = {$this->getId()};");
        return $camara->fetch_object();
    }

    public function delete(){
        $sql = "DELETE FROM camara WHERE id = {$this->getId()}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE camara SET camara = '{$this->getcamara()}' WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

}

?>