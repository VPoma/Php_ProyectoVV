<?Php if(isset($delete) && isset($male) && is_object($male)):?>
    <h1>Medio de Alerta: <?=$male->medioalerta?></h1>
    <?Php $url_action = base_url."malerta/delete&id=".$male->id;?>
<?Php else:?>
    <?Php require_once 'views/malerta/gestionMa.php'; ?>
<?Php endif;?>

<h2 class="elim">¿Esta seguro que desea eliminar esta Medio de Alerta?</h2>

<br>

<div class="fila-1">
    <a href="<?=$url_action?>" class="button solid-color">
        SI
    </a>

    <a href="<?=base_url?>malerta/gestion" class="button extra-color">
        NO
    </a>
</div>