<?Php
require_once 'models/malerta.php';

class MalertaController{

    public function index(){
        echo "<h1>El enano</h1>";
    }

    public function gestion(){
        $malerta = new Malerta();
        $alerta = $malerta->getAll();

        require_once 'views/malerta/gestionMa.php';
    }

    public function registro(){
        require_once 'views/malerta/registroMa.php';
    }

    public function save(){
        if(isset($_POST)){
            $medioalerta = isset($_POST['medioalerta']) ? $_POST['medioalerta'] : false;

            if($medioalerta){
                $malerta = new Malerta();
                $malerta->setMedioalerta($medioalerta);

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $malerta->setId($id);

                    $save = $malerta->edit();
                }else{
                    $save = $malerta->save();
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
        echo '<script>window.location="'.base_url.'malerta/gestion"</script>';
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = true;

            $malerta = new Malerta();
            $malerta->setId($id);

            $male = $malerta->getone();

            require_once 'views/malerta/eliminarMa.php';

        }else{
            echo '<script>window.location="'.base_url.'malerta/gestion"</script>';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $malerta = new Malerta();
            $malerta->setId($id);
            $delete = $malerta->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'malerta/gestion"</script>';
    }

    public function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $malerta = new Malerta();
            $malerta->setId($id);

            $male = $malerta->getone();

            require_once 'views/malerta/registroMa.php';
        }else{
            echo '<script>window.location="'.base_url.'malerta/gestion"</script>';
        }
    }
}

?>