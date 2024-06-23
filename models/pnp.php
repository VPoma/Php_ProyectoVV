<?Php

Class Pnp{
    private $id;
    private $grado;
    private $pnombre;
    private $papellidos;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getGrado(){
        return $this->grado;
    }

    function getPnombre(){
        return $this->pnombre;
    }

    function getPapellidos(){
        return $this->papellidos;
    }

    function setId($id){
        $this->id = $id;
    }

    function setGrado($grado){
        $this->grado = $this->db->real_escape_string($grado);
    }

    function setPnombre($pnombre){
        $this->pnombre = $this->db->real_escape_string($pnombre);
    }

    function setPapellidos($papellidos){
        $this->papellidos = $this->db->real_escape_string($papellidos);
    }

    public function getAll(){
        $pnp = $this->db->query("SELECT * FROM pnp ORDER BY id DESC;");
        return $pnp;
    }

    public function save(){
        $sql = "INSERT INTO pnp VALUES(NULL, '{$this->getGrado()}', '{$this->getPnombre()}', '{$this->getPapellidos()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getone(){
        $pnp = $this->db->query("SELECT * FROM pnp WHERE id = {$this->getId()};");
        return $pnp->fetch_object();
    }

    public function delete(){
        $sql = "DELETE FROM pnp WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE pnp SET grado = '{$this->getGrado()}', pnombre = '{$this->getPnombre()}', papellidos = '{$this->getPapellidos()}' WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

}

?>