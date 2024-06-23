<?Php if(isset($delete) && isset($cam) && is_object($cam)):?>
    <h1>Cámara: <?=$cam->camara?></h1>
    <?Php $url_action = base_url."camara/delete&id=".$cam->id;?>
<?Php else:?>
    <?Php require_once 'views/camara/gestionCa.php'; ?>
<?Php endif;?>


<h2 class="elim">¿Esta seguro que desea eliminar esta Área?</h2>

<br>

<div class="fila-1">
    <a href="<?=$url_action?>" class="button solid-color">
        SI
    </a>

    <a href="<?=base_url?>camara/gestion" class="button extra-color">
        NO
    </a>
</div>