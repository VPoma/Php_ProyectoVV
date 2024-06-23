
<?Php if(isset($edit) && isset($sup) && is_object($sup)):?>
    <h1>Editar Supervisor: <?=$sup->snombre?> <?=$sup->sapellidos?></h1>
    <?Php $url_action = base_url."supervisor/save&id=".$sup->id;?>
<?Php else:?>
    <h1>Registrar Supervisor</h1>
    <?Php $url_action = base_url."supervisor/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

    <label for="nombre">Nombres</label>
    <input type="text" name="snombre" value="<?=isset($sup) && is_object($sup) ? $sup->snombre : ''; ?>" required/>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="sapellidos" value="<?=isset($sup) && is_object($sup) ? $sup->sapellidos : ''; ?>" required/>

    <label for="celular">Celular</label>
    <input type="text" name="celular" value="<?=isset($sup) && is_object($sup) ? $sup->celular : ''; ?>" required/>

    <input type="submit" value="Aceptar" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>supervisor/gestion" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>