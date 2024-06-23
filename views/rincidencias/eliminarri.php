<?Php if(isset($delete) && isset($inc) && is_object($inc)):?>
    <h1>Incidencia N° <?=$inc->id?></h1>
    <?Php $url_action = base_url."rincidencias/delete&id=".$inc->id;?>
<?Php else:?>
    <?Php require_once 'views/rincidencias/gestionRi.php'; ?>
<?Php endif;?>

<h2 class="elim">¿Esta seguro que desea eliminar esta Incidencia?</h2>

<br>

<div class="fila-1">
    <a href="<?=$url_action?>" class="button solid-color">
        SI
    </a>

    <a href="<?=base_url?>rincidencias/gestion" class="button extra-color">
        NO
    </a>
</div>