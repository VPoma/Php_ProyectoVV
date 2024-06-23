<h1>Gestión Unidad</h1>

<a href="<?=base_url?>unidad/registro" class="button solid-color">
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
        <th style="width: 90px;">UNIDAD</th>
        <th style="width: 90px;">DESCRIPCION</th>
        <th style="width: 40px;">ACCIONES</th>
    </tr>
    <?Php while($uni = $unid->fetch_object()): ?>
    <tr>
        <td style="width: 40px;"><?=$uni->id?></td>
        <td style="width: 90px;"><?=$uni->unidad?></td>
        <td style="width: 90px;"><?=$uni->descripcion?></td>
        <td style="width: 40px;">
            <a href="<?=base_url?>unidad/editar&id=<?=$uni->id?>" class="button solid-colort">Editar</a>
            <a href="<?=base_url?>unidad/eliminar&id=<?=$uni->id?>" class="button extra-colort">Eliminar</a>
        </td>
    </tr>
    <?Php endwhile; ?>
</table>