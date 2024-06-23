<?Php if(isset($delete) && isset($sup) && is_object($sup)):?>
    <h1>Supervisor: <?=$sup->snombre?> <?=$sup->sapellidos?></h1>
    <?Php $url_action = base_url."supervisor/delete&id=".$sup->id;?>
<?Php else:?>
    <?Php require_once 'views/supervisor/gestionCe.php'; ?>
<?Php endif;?>

<h2 class="elim">¿Esta seguro que desea eliminar al Supervisor?</h2>

<br>

<div class="fila-1">
    <a href="<?=$url_action?>" class="button solid-color">
        SI
    </a>

    <a href="<?=base_url?>supervisor/gestion" class="button extra-color">
        NO
    </a>
</div>