<h1>Registro de Incidencias</h1>
<!--
<//?Php if(isset($edit) && isset($ope) && is_object($ope)):?>
    <h1>Editar Incidencia: <?//=$ope->nombre?> <?//=$ope->apellidos?></h1>
    <?//Php $url_action = base_url."operador/save&id=".$ope->id;?>
<?//Php else:?>
    <h1>Registro de Incidencias</h1>
    <?//Php $url_action = base_url."operador/save";?>
<?//Php endif;?>-->

<form action="<?=base_url?>rincidencias/save" method="POST" enctype="multipart/form-data">

<table>
    <tr>
        <th style="width: 300px;">
            <label for="camara">Camara</label>
            <?Php $camaras = utils::showCamara(); ?>
            <select name="camara" id="" style="width: 90%;">
                <?Php while($cam = $camaras->fetch_object()): ?>
                    <option value="<?=$cam->id?>">
                        <?=$cam->camara?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
        <th style="width: 300px;">
            <label for="referencia">Referencia</label>
            <input type="text" name="referencia" style="width: 90%;" value="<?=isset($ope) && is_object($ope) ? $ope->nombre : ''; ?>" required/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="tipodelito">Tipo de Delito</label>
            <?Php $tdelitos = utils::showTipodelito(); ?>
            <select name="tipodelito" id="" style="width: 90%;">
                <?Php while($td = $tdelitos->fetch_object()): ?>
                    <option value="<?=$td->id?>">
                        <?=$td->delito?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
        <th style="width: 300px;">
            <label for="medioalerta">Medio de Alerta</label>
            <?Php $malertas = utils::showMedioalerta(); ?>
            <select name="medioalerta" id="" style="width: 90%;">
                <?Php while($mea = $malertas->fetch_object()): ?>
                    <option value="<?=$mea->id?>">
                        <?=$mea->medioalerta?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;" colspan="2">
            <label for="descripcion" style="margin-left: 3%;">Descripción</label>
            <input type="text" name="descripcion" style="width: 95%; margin-left: 3%;" value="<?=isset($ope) && is_object($ope) ? $ope->password : ''; ?>" required/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="fechahora" style="width: 90%;" value="<?=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>
        </th>
        <th style="width: 300px;">
            <label for="horaincid">Hora de la Incidencia</label>
            <input type="time" name="horaincid" class="fechahora" style="width: 90%;" value="<?=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="intervino">¿Se intervino?</label>
            <Select name="intervino" id="" style="width: 90%;">
                <option value="SI">
                    SI
                </option>
                <option value="NO">
                    NO
                </option>
            </Select>
        </th>
        <th style="width: 300px;">
            <label for="horainterv">Hora de la Intervención</label>
            <input type="time" name="horainterv" class="fechahora" style="width: 90%;" value="<?=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>"/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="unidad">Unidad</label>
            <?Php $unidades = utils::showUnidad(); ?>
            <select name="unidad" id="" style="width: 90%;">
                <?Php while($uni = $unidades->fetch_object()): ?>
                    <option value="<?=$uni->id?>">
                        <?=$uni->unidad?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
        <th style="width: 300px;">
            <label for="numero">Número</label>
            <input type="text" name="numero" style="width: 90%;" value="<?=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>"/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="imagen">Imagen</label>
            <input type="text" name="imagen" style="width: 90%;" value="<?=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>
        </th>
        <th style="width: 300px;">
            <label for="turno">Turno</label>
            <input type="text" name="turno" style="width: 90%;" value="<?=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>"/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;" colspan="2">
            <label for="observaciones" style="margin-left: 3%;">Observaciones</label>
            <input type="text" name="observaciones" style="width: 95%;margin-left: 3%" value="<?=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>"/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="operador">Operador</label>
            <input type="hidden" value="<?=$_SESSION['identity']->id?>" name="operador"/>
            <input type="text" style="width: 90%;" value="<?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?>" disabled/>
        </th>
        <th style="width: 300px;">
            <label for="supervisor">Supervisor</label>
            <?Php $supervisores = utils::showSupervisor(); ?>
            <select name="supervisor" id="" style="width: 90%;">
                <?Php while($sup = $supervisores->fetch_object()): ?>
                    <option value="<?=$sup->id?>">
                        <?=$sup->snombre?> <?=$sup->sapellidos?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="cecom">CECOM</label>
            <?Php $cecoms = utils::showCecom(); ?>
            <select name="supervisor" id="" style="width: 90%;">
                <?Php while($cec = $cecoms->fetch_object()): ?>
                    <option value="<?=$cec->id?>">
                        <?=$cec->cnombre?> <?=$cec->capellidos?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
        <th style="width: 300px;">
            <label for="pnp">Efectivo Policial</label>
            <?Php $pnps = utils::showPnp(); ?>
            <select name="pnp" id="" style="width: 90%;">
                <?Php while($pnp = $pnps->fetch_object()): ?>
                    <option value="<?=$pnp->id?>">
                        <?=$pnp->pnombre?> <?=$pnp->papellidos?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
    </tr>
</table>

    <input type="submit" value="Aceptar" style="margin-left: 8%;" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>rincidencias/gestion" style="margin-right: 100px;" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>


<!--
    <label for="camara">Cámara</label>
    <input type="text" name="camara" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->nombre : ''; ?>" required/>

    <label for="referencia" style="float: left;">Referencia</label>
    <input type="text" name="referencia" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->nombre : ''; ?>" required/>

    <label for="tipodelito">Tipo de Delito</label>
    <input type="text" name="tipodelito" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->apellidos : ''; ?>" required/>

    <label for="medioalerta">Medio de Alerta</label>
    <input type="text" name="medioalerta" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->usuario : ''; ?>" required/>

    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->password : ''; ?>" required/>

    <label for="fecha">Fecha</label>
    <input type="date" name="fecha" class="fechahora" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="horaincid">Hora de la Incidencia</label>
    <input type="time" name="horaincid" class="fechahora" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="intervino">¿Se intervino?</label>
    <input type="text" name="intervino" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->password : ''; ?>" required/>

    <label for="horainterv">Hora de la Intervención</label>
    <input type="time" name="horainterv" class="fechahora" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="unidad">Unidad</label>
    <input type="text" name="unidad" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="numero">Número</label>
    <input type="text" name="numero" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="imagen">Imagen</label>
    <input type="text" name="imagen" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="turno">Turno</label>
    <input type="text" name="turno" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="observaciones">Observaciones</label>
    <input type="text" name="observaciones" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="operador">Operador</label>
    <input type="text" name="operador" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="supervisor">Supervisor</label>
    <input type="text" name="supervisor" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="cecom">CECOM</label>
    <input type="text" name="cecom" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>

    <label for="pnp">Efectivo Policial</label>
    <input type="text" name="pnp" style="width: 18%;" value="<?//=isset($ope) && is_object($ope) ? $ope->tipo : ''; ?>" required/>
-->