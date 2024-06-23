<?Php if(isset($edit) && isset($ope) && is_object($ope)):?>
    <h1>Editar Operador: <?=$ope->nombre?> <?=$ope->apellidos?></h1>
    <?Php $url_action = base_url."operador/save&id=".$ope->id;?>
<?Php else:?>
    <h1>Registrar Operador</h1>
    <?Php $url_action = base_url."operador/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?=isset($ope) && is_object($ope) ? $ope->nombre : ''; ?>" required/>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" value="<?=isset($ope) && is_object($ope) ? $ope->apellidos : ''; ?>" required/>

    <label for="usuario">Usuario</label>
    <input type="text" name="usuario" value="<?=isset($ope) && is_object($ope) ? $ope->usuario : ''; ?>" required/>

    <label for="password">Password</label>
    <input type="password" name="password" value="<?=isset($ope) && is_object($ope) ? $ope->password : ''; ?>" required/>

    <label for="tipo">Tipo</label>
    <input type="text" name="tipo" value="<?=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <input type="submit" value="Aceptar" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>operador/gestion" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>