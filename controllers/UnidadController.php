<?Php
require_once 'models/unidad.php';

Class UnidadController{
    public function index(){
        echo "<h1>Unidad</h1>";
    }

    public function gestion(){
        $unidad = new Unidad();
        $unid = $unidad->getAll();

        require_once 'views/unidad/gestionUn.php';
    }

    public function registro(){
        require_once 'views/unidad/registroUn.php';
    }

    public function save(){
        if(isset($_POST)){
            $unida = isset($_POST['unidad']) ? ($_POST['unidad']) : false;
            $descripcion = isset($_POST['descripcion']) ? ($_POST['descripcion']) : false;

            if($unida && $descripcion){
                $unidad = new Unidad();
                $unidad->setUnidad($unida);
                $unidad->setdescripcion($descripcion);

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $unidad->setId($id);

                    $save = $unidad->edit();
                }else{
                    $save = $unidad->save();
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
        echo '<script>window.location="'.base_url.'unidad/gestion"</script>';
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = true;

            $unidad= new Unidad();
            $unidad->setId($id);

            $uni = $unidad->getone();

            require_once 'views/unidad/eliminarUn.php';

        }else{
            echo '<script>window.location="'.base_url.'unidad/gestion"</script>';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $unidad= new Unidad();
            $unidad->setId($id);

            $delete = $unidad->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'unidad/gestion"</script>';
    }

    public function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $unidad= new Unidad();
            $unidad->setId($id);

            $uni = $unidad->getone();

            require_once 'views/unidad/registroUn.php';
        }else{
            echo '<script>window.location="'.base_url.'unidad/gestion"</script>';
        }
    }

}

?>