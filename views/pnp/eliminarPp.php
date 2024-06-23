<?Php if(isset($delete) && isset($p) && is_object($p)):?>
    <h1>PNP: <?=$p->pnombre?> <?=$p->papellidos?></h1>
    <?Php $url_action = base_url."pnp/delete&id=".$p->id;?>
<?Php else:?>
    <?Php require_once 'views/pnp/gestionPp.php'; ?>
<?Php endif;?>

<h2 class="elim">¿Esta seguro que desea eliminar al PNP?</h2>

<br>

<div class="fila-1">
    <a href="<?=$url_action?>" class="button solid-color">
        SI
    </a>

    <a href="<?=base_url?>pnp/gestion" class="button extra-color">
        NO
    </a>
</div>