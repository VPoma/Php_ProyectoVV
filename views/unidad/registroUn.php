<?Php if(isset($edit) && isset($uni) && is_object($uni)):?>
    <h1>Editar Unidad: <?=$uni->unidad?> <?=$uni->descripcion?></h1>
    <?Php $url_action = base_url."unidad/save&id=".$uni->id;?>
<?Php else:?>
    <h1>Registrar CECOM</h1>
    <?Php $url_action = base_url."unidad/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
    
    <label for="unidad">Unidad</label>
    <input type="text" name="unidad" value="<?=isset($uni) && is_object($uni) ? $uni->unidad : ''; ?>" required/>

    <label for="descripcion">descripción</label>
    <input type="text" name="descripcion" value="<?=isset($uni) && is_object($uni) ? $uni->descripcion : ''; ?>" required/>

    <input type="submit" value="Aceptar" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>unidad/gestion" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>