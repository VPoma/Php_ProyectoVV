<?Php if(isset($edit) && isset($cec) && is_object($cec)):?>
    <h1>Editar CECOM: <?=$cec->cnombre?> <?=$cec->capellidos?></h1>
    <?Php $url_action = base_url."cecom/save&id=".$cec->id;?>
<?Php else:?>
    <h1>Registrar CECOM</h1>
    <?Php $url_action = base_url."cecom/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

    <label for="nombre">Nombres</label>
    <input type="text" name="cnombre" value="<?=isset($cec) && is_object($cec) ? $cec->cnombre : ''; ?>" required/>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="capellidos" value="<?=isset($cec) && is_object($cec) ? $cec->capellidos : ''; ?>" required/>

    <input type="submit" value="Aceptar" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>cecom/gestion" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>