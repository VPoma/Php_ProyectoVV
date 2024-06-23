<?Php

Class Camara{
    private $id;
    private $camara;
    //variables extra
    private $limite;
    private $offset;
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

    //variables extra
    function getLimite(){
        return $this->limite;
    }

    function getOffset(){
        return $this->offset;
    }
    //

    function setId($id){
        $this->id = $id;
    }

    function setCamara($camara){
        $this->camara = $this->db->real_escape_string($camara);
    }
    
    //variables extra
    function setLimite($limite){
        $this->limite = $limite;
    }

    function setOffset($offset){
        $this->offset = $offset;
    }
    //

    //Consultas
    public function getAll(){
        $camaras = $this->db->query("SELECT * FROM camara ORDER BY id DESC;");
        return $camaras;
    }
    //Paginador
    public function getAllpag(){
        $camaras = $this->db->query("SELECT * FROM camara LIMIT {$this->getOffset()},{$this->getLimite()};");
        return $camaras;
    }
    //Paginador
    public function getAlltotal(){
        $camaras = $this->db->query("SELECT * FROM camara");
        return $camaras->num_rows;
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