<?Php if(isset($delete) && isset($tde) && is_object($tde)):?>
    <h1>Tipo de Delito: <?=$tde->delito?></h1>
    <?Php $url_action = base_url."tdelito/delete&id=".$tde->id;?>
<?Php else:?>
    <?Php require_once 'views/tdelito/gestionTd.php'; ?>
<?Php endif;?>

<h2 class="elim">¿Esta seguro que desea eliminar este Tipo de Delito?</h2>

<br>

<div class="fila-1">
    <a href="<?=$url_action?>" class="button solid-color">
        SI
    </a>

    <a href="<?=base_url?>tdelito/gestion" class="button extra-color">
        NO
    </a>
</div>