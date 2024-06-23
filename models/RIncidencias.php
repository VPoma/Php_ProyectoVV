<?Php

Class Rincidencias{
    private $id;
    private $id_camara;
    private $referencia;
    private $id_tipodelito;
    private $id_medioalerta;
    private $descripcion;
    private $fecha;
    private $horaincid;
    private $intervino;
    private $horainterv;
    private $id_unidad;
    private $nunidad;
    private $imagen;
    private $observaciones;
    private $id_operador;
    private $id_supervisor;
    private $id_cecom;
    private $id_pnp;    
    private $turno;
    //variables extra
    private $limite;
    private $offset;
    //
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getId_camara(){
        return $this->id_camara;
    }

    function getReferencia(){
        return $this->referencia;
    }

    function getId_tipodelito(){
        return $this->id_tipodelito;
    }

    function getId_medioalerta(){
        return $this->id_medioalerta;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function getFecha(){
        return $this->fecha;
    }

    function getHoraincid(){
        return $this->horaincid;
    }

    function getIntervino(){
        return $this->intervino;
    }

    function getHorainterv(){
        return $this->horainterv;
    }

    function getId_unidad(){
        return $this->id_unidad;
    }

    function getNunidad(){
        return $this->nunidad;
    }

    function getImagen(){
        return $this->imagen;
    }

    function getObservaciones(){
        return $this->observaciones;
    }

    function getId_operador(){
        return $this->id_operador;
    }

    function getId_supervisor(){
        return $this->id_supervisor;
    }

    function getId_cecom(){
        return $this->id_cecom;
    }

    function getId_pnp(){
        return $this->id_pnp;
    }

    function getTurno(){
        return $this->turno;
    }
    //variables extra
    function getLimite(){
        return $this->limite;
    }

    function getOffset(){
        return $this->offset;
    }
    //variables extra
    //

    function setId($id){
        $this->id = $id;
    }

    function setId_camara($id_camara){
        $this->id_camara = $id_camara;
    }

    function setReferencia($referencia){
        $this->referencia = $this->db->real_escape_string($referencia);
    }

    function setId_tipodelito($id_tipodelito){
        $this->id_tipodelito = $id_tipodelito;
    }

    function setId_medioalerta($id_medioalerta){
        $this->id_medioalerta = $id_medioalerta;
    }

    function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setFecha($fecha){
        $this->fecha = $fecha;
    }

    function setHoraincid($horaincid){
        $this->horaincid = $horaincid;
    }

    function setIntervino($intervino){
        $this->intervino = $this->db->real_escape_string($intervino);
    }

    function setHorainterv($horainterv){
        $this->horainterv = $horainterv;
    }

    function setId_unidad($id_unidad){
        $this->id_unidad = $id_unidad;
    }

    function setNunidad($nunidad){
        $this->nunidad = $nunidad;
    }

    function setImagen($imagen){
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    function setObservaciones($observaciones){
        $this->observaciones = $this->db->real_escape_string($observaciones);
    }

    function setId_operador($id_operador){
        $this->id_operador = $id_operador;
    }

    function setId_supervisor($id_supervisor){
        $this->id_supervisor = $id_supervisor;
    }

    function setId_cecom($id_cecom){
        $this->id_cecom = $id_cecom;
    }

    function setId_pnp($id_pnp){
        $this->id_pnp = $id_pnp;
    }

    function setTurno($turno){
        $this->turno = $turno;
    }
    //variables extra
    function setLimite($limite){
        $this->limite = $limite;
    }

    function setOffset($offset){
        $this->offset = $offset;
    }
    //variables extra

    //Consultas
    public function save(){
        $sql = "INSERT INTO registroincidencias VALUES(NULL, {$this->getId_camara()}, '{$this->getReferencia()}', {$this->getId_tipodelito()}, {$this->getid_medioalerta()}, '{$this->getDescripcion()}', '{$this->getFecha()}', '{$this->getHoraincid()}', '{$this->getIntervino()}', '{$this->getHorainterv()}', '{$this->getId_unidad()}', '{$this->getNunidad()}', '{$this->getImagen()}', '{$this->getObservaciones()}', {$this->getId_operador()}, {$this->getId_supervisor()}, {$this->getId_cecom()}, {$this->getId_pnp()}, '{$this->getTurno()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }
    
    public function getAll(){
        $incidencias = $this->db->query("SELECT * FROM registroincidencias ORDER BY id DESC;");
        return $incidencias;
    }

    //Paginador
    public function getAllpag(){
        $sql = "SELECT r.id as 'id', r.fecha as 'fecha', r.descripcion as 'descripcion', r.horaincid as 'horaincid', "
                . "r.intervino as 'intervino', ca.camara as 'camara', t.delito as 'delito', m.medioalerta as 'alerta', "
                . "o.nombre as 'nombre', o.apellidos as 'apellidos' FROM registroincidencias r "
                . "INNER JOIN camara ca ON ca.id = r.id_camara "
                . "INNER JOIN tipodelito t ON t.id = r.id_tipodelito "
                . "INNER JOIN medioalerta m ON m.id = r.id_medioalerta "
                . "INNER JOIN operador o ON o.id = r.id_operador "
                . "ORDER BY id DESC LIMIT {$this->getOffset()},{$this->getLimite()};";
        $incidencias = $this->db->query($sql);
        return $incidencias;
    }

    public function getAlltotal(){
        $incidencias  = $this->db->query("SELECT * FROM registroincidencias");
        return $incidencias->num_rows;
    }
    //

    public function getAllFill(){
        $sql = "SELECT r.*, ca.camara as 'camara', t.delito as 'delito', m.medioalerta as 'alerta', "
                . "o.nombre as 'nombre', o.apellidos as 'apellidos' FROM registroincidencias r "
                . "INNER JOIN camara ca ON ca.id = r.id_camara "
                . "INNER JOIN tipodelito t ON t.id = r.id_tipodelito "
                . "INNER JOIN medioalerta m ON m.id = r.id_medioalerta "
                . "INNER JOIN operador o ON o.id = r.id_operador "
                . "WHERE r.id like '%{$this->getId()}%' AND ca.id like '%{$this->getId_camara()}%' AND "
                . "r.fecha like '%{$this->getFecha()}%' AND t.id like '%{$this->getId_tipodelito()}%' AND "
                . "m.id like '%{$this->getId_medioalerta()}%' AND o.id like '%{$this->getId_operador()}%' AND "
                . "r.intervino like '%{$this->getIntervino()}%' ORDER BY id DESC;";
        $incidencias = $this->db->query($sql);
        return $incidencias;
    }

    public function getOnetic(){
        $sql = "SELECT r.*, ca.camara as 'camara', t.delito as 'delito', m.medioalerta as 'alerta', u.unidad as 'unidad', "
                . "o.nombre as 'nombre', o.apellidos as 'apellidos', s.snombre as 'snombre', s.sapellidos as 'sapellidos', " 
                . "ce.cnombre as 'cnombre', ce.capellidos as 'capellidos', p.pnombre as 'pnombre', p.papellidos as 'papellidos' FROM registroincidencias r "
                . "INNER JOIN camara ca ON ca.id = r.id_camara "
                . "INNER JOIN tipodelito t ON t.id = r.id_tipodelito "
                . "INNER JOIN medioalerta m ON m.id = r.id_medioalerta "
                . "INNER JOIN unidad u ON u.id = r.id_unidad "
                . "INNER JOIN operador o ON o.id = r.id_operador "
                . "INNER JOIN supervisor s ON s.id = r.id_supervisor "
                . "INNER JOIN cecom ce ON ce.id = r.id_cecom "
                . "INNER JOIN pnp p ON p.id = r.id_pnp "
                . "WHERE r.id = {$this->getId()};";
        $incidencias = $this->db->query($sql);
        return $incidencias->fetch_object();
    }

    public function getone(){
        $incidencias = $this->db->query("SELECT * FROM registroincidencias WHERE id = {$this->getId()};");
        return $incidencias->fetch_object();
    }

    public function delete(){
        $sql = "DELETE FROM registroincidencias WHERE id = {$this->getId()};";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }

        return $result;
    }

    public function edit(){
        $sql = "UPDATE registroincidencias SET id_camara = {$this->getId_camara()}, referencia = '{$this->getReferencia()}', id_tipodelito = {$this->getId_tipodelito()}, id_medioalerta = {$this->getid_medioalerta()}, descripcion = '{$this->getDescripcion()}', fecha = '{$this->getFecha()}', horaincid = '{$this->getHoraincid()}', intervino = '{$this->getIntervino()}', horainterv = '{$this->getHorainterv()}', id_unidad = {$this->getId_unidad()}, nunidad = '{$this->getNunidad()}', imagen = '{$this->getImagen()}', observaciones = '{$this->getObservaciones()}', id_supervisor = {$this->getId_supervisor()}, id_cecom = {$this->getId_cecom()}, id_pnp = {$this->getId_pnp()}, turno = '{$this->getTurno()}' WHERE id = {$this->getId()};";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }
}

?>