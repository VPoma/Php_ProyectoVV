<?Php

Class Cecom{
    private $id;
    private $cnombre;
    private $capellidos;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getCnombre(){
        return $this->cnombre;
    }

    function getCapellidos(){
        return $this->capellidos;
    }

    function setId($id){
        $this->id = $id;
    }

    function setCnombre($cnombre){
        $this->cnombre = $this->db->real_escape_string($cnombre);
    }

    function setCapellidos($capellidos){
        $this->capellidos = $this->db->real_escape_string($capellidos);
    }

    public function getAll(){
        $cecom = $this->db->query("SELECT * FROM cecom ORDER BY id DESC");
        return $cecom;
    }

    public function save(){
        $sql = "INSERT INTO cecom VALUES(NULL, '{$this->getCnombre()}', '{$this->getCapellidos()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getone(){
        $cecom = $this->db->query("SELECT * FROM cecom WHERE id = {$this->getId()};");
        return $cecom->fetch_object();
    }

    public function delete(){
        $sql = "DELETE FROM cecom WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE cecom SET cnombre = '{$this->getCnombre()}', capellidos = '{$this->getCapellidos()}' WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }
}

?>