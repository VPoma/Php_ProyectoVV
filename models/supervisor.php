<?Php

Class Supervisor{
    private $id;
    private $snombre;
    private $sapellidos;
    private $celular;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getSnombre(){
        return $this->snombre;
    }

    function getSapellidos(){
        return $this->sapellidos;
    }

    function getCelular(){
        return $this->celular;
    }

    function setId($id){
        $this->id = $id;
    }

    function setSnombre($snombre){
        $this->snombre = $this->db->real_escape_string($snombre);
    }

    function setSapellidos($sapellidos){
        $this->sapellidos = $this->db->real_escape_string($sapellidos);
    }

    function setCelular($celular){
        $this->celular = $celular;
    }

    public function getAll(){
        $supervisor = $this->db->query("SELECT * FROM supervisor ORDER BY id DESC");
        return $supervisor;
    }

    public function save(){
        $sql = "INSERT INTO supervisor VALUES(NULL, '{$this->getSnombre()}', '{$this->getSapellidos()}', {$this->getCelular()});";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getone(){
        $supervisor = $this->db->query("SELECT * FROM supervisor WHERE id = {$this->getId()};");
        return $supervisor->fetch_object();
    }

    public function delete(){
        $sql = "DELETE FROM supervisor WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE supervisor SET snombre = '{$this->getSnombre()}', sapellidos = '{$this->getSapellidos()}', celular = {$this->getCelular()} WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

}

?>