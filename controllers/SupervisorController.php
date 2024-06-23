<?Php
require_once 'models/supervisor.php';

Class SupervisorController{
    public function index(){
        echo "<h1>Supervisor</h1>";
    }

    public function gestion(){
        $supervisor = new Supervisor();
        $super = $supervisor->getAll();

        require_once 'views/supervisor/gestionSu.php';
    }

    public function registro(){
        require_once 'views/supervisor/registroSu.php';
    }

    public function save(){
        if(isset($_POST)){
            $snombre = isset($_POST['snombre']) ? $_POST['snombre'] : false;
            $sapellidos = isset($_POST['sapellidos']) ? $_POST['sapellidos'] : false;
            $celular = isset($_POST['celular']) ? $_POST['celular'] : false;

            if($snombre && $sapellidos && $celular){
                $supervisor = new Supervisor();
                $supervisor->setSnombre($snombre);
                $supervisor->setSapellidos($sapellidos);
                $supervisor->setCelular($celular);

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $supervisor->setId($id);

                    $save = $supervisor->edit();
                }else{
                    $save = $supervisor->save();
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
        echo '<script>window.location="'.base_url.'supervisor/gestion"</script>';
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = true;

            $supervisor = new Supervisor();
            $supervisor->setId($id);

            $sup = $supervisor->getone();

            require_once 'views/supervisor/eliminarSu.php';

        }else{
            echo '<script>window.location="'.base_url.'supervisor/gestion"</script>';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $supervisor = new Supervisor();
            $supervisor->setId($id);

            $delete = $supervisor->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'supervisor/gestion"</script>';
    }

    public function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $supervisor = new Supervisor();
            $supervisor->setId($id);

            $sup = $supervisor->getone();

            require_once 'views/supervisor/registroSu.php';
        }else{
            echo '<script>window.location="'.base_url.'supervisor/gestion"</script>';
        }
    }
}

?>