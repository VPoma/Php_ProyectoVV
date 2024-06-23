<?Php
require_once 'models/operador.php';

Class OperadorController{
    public function index(){
        echo "<h1>OPERADOR</h1>";
    }

    public function login(){
        if(isset($_POST)){
            //Identificar al usuario
            //consulta a la base de datos

            $operador = new Operador();
            $operador->setUsuario($_POST['usuario']);
            $operador->setPassword($_POST['password']);
            
            $identity = $operador->login();
            //var_dump($identity);
            //die();
            
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if($identity->tipo == 'admin'){
                    $_SESSION['admin'] = true;
                }

            }else{
                $_SESSION['error_login'] = 'Identifiación fallida !!';
            }
        }
        echo '<script>window.location="'.base_url.'"</script>';
    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        echo '<script>window.location="'.base_url.'"</script>';

    }

    public function gestion(){
        $operador = new Operador();
        $opera = $operador->getAll();

        require_once 'views/operador/gestionOp.php';
    }

    public function registro(){
        require_once 'views/operador/registroOp.php';
    }

    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;

            if($nombre && $apellidos && $usuario && $password && $tipo){
                $operador = new Operador();
                $operador->setNombre($nombre);
                $operador->setApellidos($apellidos);
                $operador->setUsuario($usuario);
                $operador->setPassword($password);
                $operador->setTipo($tipo);

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $operador->setId($id);

                    $save = $operador->edit();
                }else{
                    $save = $operador->save();
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
        echo '<script>window.location="'.base_url.'operador/gestion"</script>';
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = true;

            $operador = new Operador();
            $operador->setId($id);

            $ope = $operador->getone();

            require_once 'views/operador/eliminarOp.php';

        }else{
            echo '<script>window.location="'.base_url.'operador/gestion"</script>';
        }
    }

    public function delete(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $operador = new Operador();
            $operador->setId($id);

            $delete = $operador->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }
        echo '<script>window.location="'.base_url.'operador/gestion"</script>';
    }

    public function editar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $operador = new Operador();
            $operador->setId($id);

            $ope = $operador->getone();

            require_once 'views/operador/registroOp.php';
        }else{
            echo '<script>window.location="'.base_url.'operador/gestion"</script>';
        }
    }
}

?>