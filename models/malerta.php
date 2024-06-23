<?Php

Class Malerta{
    private $id;
    private $medioalerta;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getMedioalerta(){
        return $this->medioalerta;
    }

    function setId($id){
        $this->id = $id;
    }

    function setMedioalerta($medioalerta){
        $this->medioalerta = $this->db->real_escape_string($medioalerta);
    }

    public function getAll(){
        $malerta = $this->db->query("SELECT * FROM medioalerta ORDER BY id DESC;");
        return $malerta;
    }

    public function save(){
        $sql = "INSERT INTO medioalerta VALUES(NULL, '{$this->getMedioalerta()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getone(){
        $malerta = $this->db->query("SELECT * FROM medioalerta WHERE id = {$this->getId()};");
        return $malerta->fetch_object();
    }

    public function delete(){
        $sql = "DELETE FROM medioalerta WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE medioalerta SET medioalerta = '{$this->getMedioalerta()}' WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

}

?>