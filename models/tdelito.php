<?Php

class Tdelito{
    private $id;
    private $delito;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getDelito(){
        return $this->delito;
    }

    function setId($id){
        $this->id = $id;
    }

    function setDelito($delito){
        $this->delito = $this->db->real_escape_string($delito);
    }

    //Consultas
    public function getAll(){
        $tdelito = $this->db->query("SELECT * FROM tipodelito ORDER BY id DESC");
        return $tdelito;
    }

    public function save(){
        $sql = "INSERT INTO tipodelito VALUES(NULL, '{$this->getDelito()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getone(){
        $tdelito = $this->db->query("SELECT * FROM tipodelito WHERE id = {$this->getId()};");
        return $tdelito->fetch_object();
    }

    public function delete(){
        $sql = "DELETE FROM tipodelito WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE tipodelito SET delito = '{$this->getDelito()}' WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

}

?>