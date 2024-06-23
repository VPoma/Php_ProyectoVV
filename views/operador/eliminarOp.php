<?Php if(isset($delete) && isset($ope) && is_object($ope)):?>
    <h1>Operador: <?=$ope->nombre?></h1>
    <?Php $url_action = base_url."operador/delete&id=".$ope->id;?>
<?Php else:?>
    <?Php require_once 'views/operador/gestionOp.php'; ?>
<?Php endif;?>


<h2 class="elim">¿Esta seguro que desea eliminar este Operador?</h2>

<br>

<div class="fila-1">
    <a href="<?=$url_action?>" class="button solid-color">
        SI
    </a>

    <a href="<?=base_url?>operador/gestion" class="button extra-color">
        NO
    </a>
</div>