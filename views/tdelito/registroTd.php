<?Php if(isset($edit) && isset($tde) && is_object($tde)):?>
    <h1>Editar Medio de Alerta: <?=$tde->delito?></h1>
    <?Php $url_action = base_url."tdelito/save&id=".$tde->id;?>
<?Php else:?>
    <h1>Registrar Tipo de Delito</h1>
    <?Php $url_action = base_url."tdelito/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

    <label for="nombre">Delito</label>
    <input type="text" name="delito" value="<?=isset($tde) && is_object($tde) ? $tde->delito : ''; ?>" required/>

    <input type="submit" value="Aceptar" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>tdelito/gestion" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>