<?Php if(isset($edit) && isset($inc) && is_object($inc)):?>
    <h1>Editar Incidencia N° <?=$inc->id?></h1>
    <?Php $url_action = base_url."rincidencias/save&id=".$inc->id;?>
<?Php else:?>
    <h1>Registro de Incidencias</h1>
    <?Php $url_action = base_url."rincidencias/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

<table>
    <tr>
        <th style="width: 300px;">
            <label for="camara">Camara</label>
            <?Php $camaras = utils::showCamara(); ?>
            <select name="camara" id="" style="width: 90%;">
                <?Php while($cam = $camaras->fetch_object()): ?>
                    <option value="<?=$cam->id?>" <?=isset($inc) && is_object($inc) && $cam->id == $inc->id_camara ? 'selected' : ''; ?>>
                        <?=$cam->camara?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
        <th style="width: 300px;">
            <label for="referencia">Referencia</label>
            <input type="text" name="referencia" style="width: 90%;" value="<?=isset($inc) && is_object($inc) ? $inc->referencia : ''; ?>" required/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="tipodelito">Tipo de Delito</label>
            <?Php $tdelitos = utils::showTipodelito(); ?>
            <select name="tipodelito" id="" style="width: 90%;">
                <?Php while($td = $tdelitos->fetch_object()): ?>
                    <option value="<?=$td->id?>" <?=isset($inc) && is_object($inc) && $td->id == $inc->id_tipodelito ? 'selected' : ''; ?>>
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
                    <option value="<?=$mea->id?>" <?=isset($inc) && is_object($inc) && $mea->id == $inc->id_medioalerta ? 'selected' : ''; ?>>
                        <?=$mea->medioalerta?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;" colspan="2">
            <label for="descripcion" style="margin-left: 3%;">Descripción</label>
            <input type="text" name="descripcion" style="width: 95%; margin-left: 3%;" value="<?=isset($inc) && is_object($inc) ? $inc->descripcion : ''; ?>" required/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="fechahora" style="width: 90%;" value="<?=isset($inc) && is_object($inc) ? $inc->fecha : ''; ?>" required/>
        </th>
        <th style="width: 300px;">
            <label for="horaincid">Hora de la Incidencia</label>
            <input type="time" name="horaincid" class="fechahora" style="width: 90%;" value="<?=isset($inc) && is_object($inc) ? $inc->horaincid : ''; ?>" required/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="intervino">¿Se intervino?</label>
            <Select name="intervino" id="" style="width: 90%;">
                <option value="SI" <?=isset($inc) && is_object($inc) && $inc->intervino == "SI" ?  'selected' : ''; ?>>
                    SI
                </option>
                <option value="NO" <?=isset($inc) && is_object($inc) && $inc->intervino == "NO" ?  'selected' : ''; ?>>
                    NO
                </option>
            </Select>
        </th>
        <th style="width: 300px;">
            <label for="horainterv">Hora de la Intervención</label>
            <input type="time" name="horainterv" class="fechahora" style="width: 90%;" value="<?=isset($inc) && is_object($inc) ? $inc->horainterv : ''; ?>"/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="unidad">Unidad</label>
            <?Php $unidades = utils::showUnidad(); ?>
            <select name="unidad" id="" style="width: 90%;">
                <?Php while($uni = $unidades->fetch_object()): ?>
                    <option value="<?=$uni->id?>" <?=isset($inc) && is_object($inc) && $uni->id == $inc->id_unidad ? 'selected' : ''; ?>>
                        <?=$uni->unidad?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
        <th style="width: 300px;">
            <label for="numero">Número</label>
            <input type="text" name="numero" style="width: 90%;" value="<?=isset($inc) && is_object($inc) ? $inc->nunidad : ''; ?>"/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;">
            <label for="turno">Turno</label>
            <Select name="turno" id="" style="width: 90%;">
                <option value="MAÑANA" <?=isset($inc) && is_object($inc) && $inc->turno == "MAÑANA" ?  'selected' : ''; ?>>
                    MAÑANA
                </option>
                <option value="TARDE" <?=isset($inc) && is_object($inc) && $inc->turno == "TARDE" ?  'selected' : ''; ?>>
                    TARDE
                </option>
                <option value="NOCHE" <?=isset($inc) && is_object($inc) && $inc->turno == "NOCHE" ?  'selected' : ''; ?>>
                    NOCHE
                </option>
            </Select>
        </th>
        <th style="width: 300px;">
            <label for="supervisor">Supervisor</label>
            <?Php $supervisores = utils::showSupervisor(); ?>
            <select name="supervisor" id="" style="width: 90%;">
                <?Php while($sup = $supervisores->fetch_object()): ?>
                    <option value="<?=$sup->id?>" <?=isset($inc) && is_object($inc) && $sup->id == $inc->id_supervisor ? 'selected' : ''; ?>>
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
            <select name="cecom" id="" style="width: 90%;">
                <?Php while($cec = $cecoms->fetch_object()): ?>
                    <option value="<?=$cec->id?>" <?=isset($inc) && is_object($inc) && $cec->id == $inc->id_cecom ? 'selected' : ''; ?>>
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
                    <option value="<?=$pnp->id?>" <?=isset($inc) && is_object($inc) && $pnp->id == $inc->id_pnp ? 'selected' : ''; ?>>
                        <?=$pnp->pnombre?> <?=$pnp->papellidos?>
                    </option>
                <?Php endwhile; ?>
            </select>
        </th>
    </tr>
    <tr>
        <th>            
            <input type="hidden" name="operador" value="<?=$_SESSION['identity']->id?>"/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;" colspan="2">
            <label for="observaciones" style="margin-left: 3%;">Observaciones</label>
            <input type="text" name="observaciones" style="width: 95%;margin-left: 3%" value="<?=isset($inc) && is_object($inc) ? $inc->observaciones : ''; ?>"/>
        </th>
    </tr>
    <tr>
        <th style="width: 300px;" colspan="2">
            <label for="imagen" style="margin-left: 3%;">Imagen</label>
            <input type="text" name="imagen" style="width: 95%;margin-left: 3%" value="<?=isset($inc) && is_object($inc) ? $inc->imagen : ''; ?>" required/>
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