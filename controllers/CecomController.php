<?Php
require_once 'models/cecom.php';

Class CecomController{
    public function index(){
        echo "<h1>Viernes 17</h1>";
    }

    public function gestion(){
        $cecom = new Cecom();
        $ceco = $cecom->getAll();

        require_once 'views/cecom/gestionCe.php';
    }

    public function registro(){
        require_once 'views/cecom/registroCe.php';
    }

    public function save(){
        if(isset($_POST)){
            $cnombre = isset($_POST['cnombre']) ? $_POST['cnombre'] : false;
            $capellidos = isset($_POST['capellidos']) ? $_POST['capellidos'] : false;

            if($cnombre && $capellidos){
                $cecom = new Cecom();
                $cecom->setCnombre($cnombre);
                $cecom->setCapellidos($capellidos);

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $cecom->setId($id);

                    $save = $cecom->edit();
                }else{
                    $save = $cecom->save();
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
        echo '<script>window.location="'.base_url.'cecom/gestion"</script>';
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = true;

            $cecom = new Cecom();
            $cecom->setId($id);

            $cec = $cecom->getone();

            require_once 'views/cecom/eliminarCe.php';

        }else{
            echo '<script>window.location="'.base_url.'cecom/gestion"</script>';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $cecom = new Cecom();
            $cecom->setId($id);

            $delete = $cecom->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'cecom/gestion"</script>';
    }

    public function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $cecom = new Cecom();
            $cecom->setId($id);

            $cec = $cecom->getone();

            require_once 'views/cecom/registroCe.php';
        }else{
            echo '<script>window.location="'.base_url.'cecom/gestion"</script>';
        }
    }
}

?>