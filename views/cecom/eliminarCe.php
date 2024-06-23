<?Php if(isset($delete) && isset($cec) && is_object($cec)):?>
    <h1>CECOM: <?=$cec->cnombre?> <?=$cec->capellidos?></h1>
    <?Php $url_action = base_url."cecom/delete&id=".$cec->id;?>
<?Php else:?>
    <?Php require_once 'views/cecom/gestionCe.php'; ?>
<?Php endif;?>

<h2 class="elim">¿Esta seguro que desea eliminar al CECOM?</h2>

<br>

<div class="fila-1">
    <a href="<?=$url_action?>" class="button solid-color">
        SI
    </a>

    <a href="<?=base_url?>cecom/gestion" class="button extra-color">
        NO
    </a>
</div>