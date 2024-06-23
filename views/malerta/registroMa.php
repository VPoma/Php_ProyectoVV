<?Php if(isset($edit) && isset($male) && is_object($male)):?>
    <h1>Editar Medio de Alerta: <?=$male->medioalerta?></h1>
    <?Php $url_action = base_url."malerta/save&id=".$male->id;?>
<?Php else:?>
    <h1>Registro Medio de Alerta</h1>
    <?Php $url_action = base_url."malerta/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

    <label for="nombre">Medio de Alerta</label>
    <input type="text" name="medioalerta" value="<?=isset($male) && is_object($male) ? $male->medioalerta : ''; ?>" required/>

    <input type="submit" value="Aceptar" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>malerta/gestion" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>