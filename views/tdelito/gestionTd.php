<h1>Gestión Tipo de Delito</h1>

<a href="<?=base_url?>tdelito/registro" class="button solid-color">
    Agregar Nuevo
</a>

<br><br>
<?Php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong class="alert_green">Registro ingresado/modificado Correctamente</strong>
<?Php elseif(isset($_SESSION['register']) && $_SESSION['register'] != 'complete'): ?>
    <strong class="alert_red">Error: Introduce bien los datos</strong>
<?Php endif; ?>
<?Php Utils::deleteSession('register');?>

<?Php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">Registro Eliminado correctamente</strong>
<?Php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">Error: Registro No Eliminado</strong>
<?Php endif; ?>
<?Php Utils::deleteSession('delete');?>
<br>

<table class="tablita">
    <tr>
        <th style="width: 40px;">ID</th>
        <th style="width: 180px;">TIPO DE DELITO</th>
        <th style="width: 40px;">ACCIONES</th>
    </tr>
    <?Php while($tdel = $delito->fetch_object()): ?>
    <tr>
        <td style="width: 40px;"><?=$tdel->id?></td>
        <td style="width: 180px;"><?=$tdel->delito?></td>
        <td style="width: 40px;">
            <a href="<?=base_url?>tdelito/editar&id=<?=$tdel->id?>" class="button solid-colort">Editar</a>
            <a href="<?=base_url?>tdelito/eliminar&id=<?=$tdel->id?>" class="button extra-colort">Eliminar</a>
        </td>
    </tr>
    <?Php endwhile; ?>
</table>