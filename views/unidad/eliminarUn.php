<?Php if(isset($delete) && isset($uni) && is_object($uni)):?>
    <h1>Unidad: <?=$uni->unidad?> <?=$uni->descripcion?></h1>
    <?Php $url_action = base_url."unidad/delete&id=".$uni->id;?>
<?Php else:?>
    <?Php require_once 'views/unidad/gestionUn.php'; ?>
<?Php endif;?>

<h2 class="elim">¿Esta seguro que desea eliminar la Unidad?</h2>

<br>

<div class="fila-1">
    <a href="<?=$url_action?>" class="button solid-color">
        SI
    </a>

    <a href="<?=base_url?>unidad/gestion" class="button extra-color">
        NO
    </a>
</div>