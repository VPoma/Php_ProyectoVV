<?Php

require_once 'models/camara.php';

Class CamaraController{

    public function index(){
        echo "<h1> Controlador Cámara, Accion Index </h1>";
    }

    public function registro(){
        require_once 'views/camara/registroCa.php';
    }

    public function save(){
        if(isset($_POST)){
            $nombrecam = isset($_POST['camara']) ? $_POST['camara'] : false;

            if($nombrecam){
                $camara = new Camara();
                $camara->setCamara($nombrecam);

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $camara->setId($id);

                    $save = $camara->edit();
                }else{
                    $save = $camara->save();
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
        echo '<script>window.location="'.base_url.'camara/gestion"</script>';
    }

    public function gestion(){
        $camara = new Camara();
        $camaras = $camara->getAll();

        require_once 'views/camara/gestionCa.php';
    }

    public function eliminar(){

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = true;

            $camara = new Camara();
            $camara->setId($id);
            
            $cam = $camara->getOne();

            require_once 'views/camara/eliminarCa.php';
        }else{
            echo '<script>window.location="'.base_url.'camara/gestion"</script>';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $camara = new Camara();
            $camara->setId($id);
            $delete = $camara->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'camara/gestion"</script>';
    }

    public function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $camara = New Camara();
            $camara->setId($id);

            $cam = $camara->getOne();

            require_once 'views/camara/registroCa.php';
        }else{
            echo '<script>window.location="'.base_url.'camara/gestion"</script>';
        }
    }

}

?>