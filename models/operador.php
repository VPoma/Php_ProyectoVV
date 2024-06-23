<?Php

Class Operador{
    private $id;
    private $nombre;
    private $apellidos;
    private $usuario;
    private $password;
    private $tipo;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getApellidos(){
        return $this->apellidos;
    }

    function getUsuario(){
        return $this->usuario;
    }

    function getPassword(){
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' =>4]);
    }

    function getTipo(){
        return $this->tipo;
    }

    function setId($id){
        $this->id = $id;
    }

    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos){
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setUsuario($usuario){
        $this->usuario = $this->db->real_escape_string(($usuario));
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function login(){
        $result = false;
        $usuario = $this->usuario;
        $password = $this->password;

        //comprobar si existe el usuario
        $sql = "SELECT * FROM operador WHERE usuario = '$usuario'";
        $login = $this->db->query($sql);

        if($login && $login->num_rows == 1){
            $user = $login->fetch_object();
            
            //$result = $user;

            //verificar la contraseña
            
            $verifica = password_verify($password, $user->password);
            
            if($verifica){
                $result = $user;
            }
        }

        return $result;
    }

    public function getAll(){
        $operador = $this->db->query("SELECT * FROM operador ORDER BY id DESC;");
        return $operador;
    }

    public function save(){
        $sql = "INSERT INTO operador VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getUsuario()}', '{$this->getPassword()}', '{$this->getTipo()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function getone(){
        $pnp = $this->db->query("SELECT * FROM operador WHERE id = {$this->getId()};");
        return $pnp->fetch_object();
    }

    public function delete(){
        $sql = "DELETE FROM operador WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE operador SET nombre = '{$this->getNombre()}', apellidos = '{$this->getApellidos()}', usuario = '{$this->getUsuario()}', password = '{$this->getPassword()}', tipo= '{$this->getTipo()}' WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }
}

?>