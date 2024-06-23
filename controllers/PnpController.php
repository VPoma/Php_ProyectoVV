<?Php
require_once 'models/pnp.php';

Class PnpController{
    public function index(){
        echo "<h1>PNP</h1>";
    }

    public function gestion(){
        $pnp = new Pnp();
        $pp = $pnp->getAll();

        require_once 'views/pnp/gestionPp.php';
    }

    public function registro(){
        require_once 'views/pnp/registroPp.php';
    }

    public function save(){
        if(isset($_POST)){
            $grado = isset($_POST['grado']) ? $_POST['grado'] : false;
            $pnombre = isset($_POST['pnombre']) ? $_POST['pnombre'] : false;
            $papellidos = isset($_POST['papellidos']) ? $_POST['papellidos'] : false;

            if($grado && $pnombre && $papellidos){
                $pnp = new Pnp();
                $pnp->setGrado($grado);
                $pnp->setPnombre($pnombre);
                $pnp->setPapellidos($papellidos);

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $pnp->setId($id);

                    $save = $pnp->edit();
                }else{
                    $save = $pnp->save();
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
        echo '<script>window.location="'.base_url.'pnp/gestion"</script>';
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = true;

            $pnp = new Pnp();
            $pnp->setId($id);

            $p = $pnp->getone();

            require_once 'views/pnp/eliminarPp.php';

        }else{
            echo '<script>window.location="'.base_url.'pnp/gestion"</script>';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $pnp = new Pnp();
            $pnp->setId($id);

            $delete = $pnp->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'pnp/gestion"</script>';
    }

    public function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $pnp = new Pnp();
            $pnp->setId($id);

            $p = $pnp->getone();

            require_once 'views/pnp/registroPp.php';
        }else{
            echo '<script>window.location="'.base_url.'pnp/gestion"</script>';
        }
    }
}

?>