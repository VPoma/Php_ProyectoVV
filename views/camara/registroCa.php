<?Php if(isset($edit) && isset($cam) && is_object($cam)):?>
    <h1>Editar Cámara: <?=$cam->camara?></h1>
    <?Php $url_action = base_url."camara/save&id=".$cam->id;?>
<?Php else:?>
    <h1>Registro de Cámaras</h1>
    <?Php $url_action = base_url."camara/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

    <label for="nombre">Cámara</label>
    <input type="text" name="camara" value="<?=isset($cam) && is_object($cam) ? $cam->camara : ''; ?>" required/>

    <input type="submit" value="Aceptar" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>camara/gestion" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>