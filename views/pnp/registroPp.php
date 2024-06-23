<?Php if(isset($edit) && isset($p) && is_object($p)):?>
    <h1>Editar Supervisor: <?=$p->pnombre?> <?=$p->papellidos?></h1>
    <?Php $url_action = base_url."pnp/save&id=".$p->id;?>
<?Php else:?>
    <h1>Registrar Supervisor</h1>
    <?Php $url_action = base_url."pnp/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

    <label for="grado">Grado</label>
    <input type="text" name="grado" value="<?=isset($p) && is_object($p) ? $p->grado : ''; ?>" required/>

    <label for="nombre">Nombres</label>
    <input type="text" name="pnombre" value="<?=isset($p) && is_object($p) ? $p->pnombre : ''; ?>" required/>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="papellidos" value="<?=isset($p) && is_object($p) ? $p->papellidos : ''; ?>" required/>

    <input type="submit" value="Aceptar" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>pnp/gestion" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>