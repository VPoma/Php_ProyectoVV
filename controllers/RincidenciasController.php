<?Php

require_once 'models/RIncidencias.php';

Class RincidenciasController{

    public function index(){
        echo "<h1>Registro</h1>";
    }

    public function registro(){
        require_once 'views/rincidencias/registroRi.php';
    }

    public function save(){
        if(isset($_POST)){
            $camara = isset($_POST['camara']) ? $_POST['camara'] : false;
            $referencia = isset($_POST['referencia']) ? $_POST['referencia'] : false;
            $tipodelito = isset($_POST['tipodelito']) ? $_POST['tipodelito'] : false;
            $medioalerta = isset($_POST['medioalerta']) ? $_POST['medioalerta'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
            $horaincid = isset($_POST['horaincid']) ? $_POST['horaincid'] :false;
            $intervino = isset($_POST['intervino']) ? $_POST['intervino'] :false;
            $horainterv = isset($_POST['horainterv']) ? $_POST['horainterv'] :false;
            $unidad = isset($_POST['unidad']) ? $_POST['unidad'] : false;
            $numero = isset($_POST['numero']) ? $_POST['numero'] : false;
            $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
            $observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : false;
            $operador = isset($_POST['operador']) ? $_POST['operador'] : false;
            $supervisor = isset($_POST['supervisor']) ? $_POST['supervisor'] : false;
            $cecom = isset($_POST['cecom']) ? $_POST['cecom'] : false;
            $pnp = isset($_POST['pnp']) ? $_POST['pnp'] : false;
            $turno = isset($_POST['turno']) ? $_POST['turno'] : false;

            if($camara && $referencia && $tipodelito && $medioalerta && $descripcion){
                $incidencias = new Rincidencias();
                $incidencias->setId_camara($camara);
                $incidencias->setReferencia($referencia);
                $incidencias->setId_tipodelito($tipodelito);
                $incidencias->setId_medioalerta($medioalerta);
                $incidencias->setDescripcion($descripcion);
                $incidencias->setfecha($fecha);
                $incidencias->setHoraincid($horaincid);
                $incidencias->setIntervino($intervino);
                $incidencias->setHorainterv($horainterv);
                $incidencias->setId_unidad($unidad);
                $incidencias->setNunidad($numero);
                $incidencias->setObservaciones($observaciones);
                $incidencias->setId_operador($operador);
                $incidencias->setId_supervisor($supervisor);
                $incidencias->setId_cecom($cecom);
                $incidencias->setId_pnp($pnp);
                $incidencias->setTurno($turno);
                //$incidencias->setImagen($imagen);

                //Guardar la imagen
                if(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                            
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images', 0777, true);
                        }

                        move_uploaded_file($file['tmp_name'],'uploads/images/'.$filename);
                        $incidencias->setImagen($filename);
                    }
                }

                //$save = $incidencias->save();
                
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $incidencias->setId($id);

                    $save = $incidencias->edit();
                }else{
                    $save = $incidencias->save();
                }

                if($save){
                    $_SESSION['register'] = 'complete';
                }else{
                    $_SESSION['register'] = 'failed';
                }
            }else{
                $_SESSION['register'] = 'failed';
            }
        }else{
            $_SESSION['register'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'rincidencias/gestion"</script>';
    }

    public function gestion(){
        //Paginador
        if(isset($_GET['pag'])){
            $pag = $_GET['pag'];
        }else{
            $pag = 1;
        }

        $limite = 10;
        $offset = ($pag-1)*$limite;

        $incidencias = new Rincidencias();
        $incidencias->setOffset($offset);
        $incidencias->setLimite($limite);
        $incide = $incidencias->getAllpag();

        $total = $incidencias->getAlltotal();

        $totalP = ceil($total/$limite);
        $totalPag = $totalP;

        require_once 'views/rincidencias/gestionRi.php';
    }

    public function filtrori(){
        if(isset($_POST)){
            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
            $camara = isset($_POST['camara']) ? $_POST['camara'] : false;
            $tipodelito = isset($_POST['tipodelito']) ? $_POST['tipodelito'] : false;
            $medioalerta = isset($_POST['medioalerta']) ? $_POST['medioalerta'] : false;
            $operador = isset($_POST['operador']) ? $_POST['operador'] : false;
            $intervino = isset($_POST['intervino']) ? $_POST['intervino'] :false;

            $incidencias = new Rincidencias();

            /*Utilizando strlen(trim($?)) para calcular la cantidad de digitos
            Logre realizar la consulta IF*/
            if(strlen(trim($id)) == 0 && strlen(trim($fecha)) == 0 && strlen(trim($camara)) == 0 && strlen(trim($tipodelito)) == 0 && strlen(trim($medioalerta)) == 0 && strlen(trim($operador)) == 0 && strlen(trim($intervino)) == 0){    
                echo '<script>window.location="'.base_url.'rincidencias/gestion"</script>';
            }else{
                $incidencias->setId($id);
                $incidencias->setfecha($fecha);
                $incidencias->setId_camara($camara);
                $incidencias->setId_tipodelito($tipodelito);
                $incidencias->setId_medioalerta($medioalerta);
                $incidencias->setId_operador($operador);
                $incidencias->setIntervino($intervino);
                $incide = $incidencias->getAllFill();
            }

        }
        require_once 'views/rincidencias/gestionRi.php';
    }

    public function detalle(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $detail = true;

            $inciden = new Rincidencias();
            $inciden->setId($id);

            $inc = $inciden->getOnetic();

            require_once 'views/rincidencias/detalleri.php';

        }else{
            echo '<script>window.location="'.base_url.'rincidencias/gestion"</script>';
        }
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = true;

            $inciden = new rincidencias();
            $inciden->setId($id);

            $inc = $inciden->getone();

            require_once 'views/rincidencias/eliminarri.php';

        }else{
            echo '<script>window.location="'.base_url.'rincidencias/gestion"</script>';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $inciden = new rincidencias();
            $inciden->setId($id);

            $delete = $inciden->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'rincidencias/gestion"</script>';
    }

    public function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $inciden = new rincidencias();
            $inciden->setId($id);

            $inc = $inciden->getOnetic();

            require_once 'views/rincidencias/registrori.php';
        }else{
            echo '<script>window.location="'.base_url.'rincidencias/gestion"</script>';
        }
    }

}

?>