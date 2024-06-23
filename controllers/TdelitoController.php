<?Php
require_once 'models/tdelito.php';

Class TdelitoController{
    public function index(){
        echo "<h1>Lero Lero</h1>";
    }

    public function gestion(){
        $tdelito = new Tdelito();
        $delito = $tdelito->getAll();

        require_once 'views/tdelito/gestionTd.php';
    }

    public function registro(){
        require_once 'views/tdelito/registroTd.php';
    }

    public function save(){
        if(isset($_POST)){
            $delito = isset($_POST['delito']) ? $_POST['delito'] : false;

            if($delito){
                $tdelito = new Tdelito();
                $tdelito->setDelito($delito);

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $tdelito->setId($id);

                    $save = $tdelito->edit();
                }else{
                    $save = $tdelito->save();
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
        echo '<script>window.location="'.base_url.'tdelito/gestion"</script>';
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = true;

            $tdelito = new Tdelito();
            $tdelito->setId($id);

            $tde = $tdelito->getone();

            require_once 'views/tdelito/eliminarTd.php';

        }else{
            echo '<script>window.location="'.base_url.'tdelito/gestion"</script>';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $tdelito = new Tdelito();
            $tdelito->setId($id);
            $delete = $tdelito->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'tdelito/gestion"</script>';
    }

    public function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $tdelito = new Tdelito();
            $tdelito->setId($id);

            $tde = $tdelito->getone();

            require_once 'views/tdelito/registroTd.php';
        }else{
            echo '<script>window.location="'.base_url.'tdelito/gestion"</script>';
        }
    }
}

?>