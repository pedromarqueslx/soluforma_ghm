<?php
$segment_1 = $this->uri->segment(1);
$segment = $this->uri->segment(2);
$segment_3 = $this->uri->segment(3);
?>

<?php echo form_open('multas/edit/'.$artigos['id'] ); ?>

<div class="container-fluid bg-light">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-6">
                <h1>Registo de Multa</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-danger" href="<?php echo site_url(); ?>/<?php echo $segment_1; ?>/delete/<?php echo $segment_3; ?>" onClick="return confirm('Quer mesmo apagar o registo?')" >Apagar</a>
                <a class="btn btn-primary" href="<?php echo base_url("/index.php/multas/pdf/". $artigos['id'] ); ?>" target="_blank">PDF</a>
                <button class="btn btn-success mx-auto"><span class="fa fa-save"></span> Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <label>ID</label>
            <div class="control">
                <input type="text" class="form-control" name="multa" value="<?php echo $artigos['multa'] ?>" readonly />
            </div>
        </div>
        <div class="col-md-3">
            <label>Nome *</label>
            <div class="control">
                <!--<p class="half-vertical-space"><?php //echo $artigos['title'] ?></p>-->
                <input type="text" class="form-control" name="title" value="<?php echo $artigos['title'] ?>" />
            </div>
        </div>
        <div class="col-md-3">
            <label>Data Registo *</label>
            <div class="control">
                <input type="text" class="form-control" name="data" id="datepicker" value="<?php echo $artigos['data'] ?>" placeholder="Ano-Mês-Dia"/>
                <div class="small"><?php echo form_error('data'); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <label>Data Multa</label>
            <div class="control">
                <input type="text" class="form-control" name="data_fim" id="datepicker1" value="<?php echo $artigos['data_fim'] ?>" placeholder="Ano-Mês-Dia"/>
                <div class="small"><?php echo form_error('data_fim'); ?></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>Auto Nº</label>
            <div class="control">
                <input type="text" class="form-control" name="auto" value="<?php echo $artigos['auto'] ?>" placeholder="auto"/>
                <div class="small"><?php echo form_error('auto'); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <label>Matrícula</label>
            <div class="control">
                <input type="text" class="form-control" name="matricula" value="<?php echo $artigos['matricula'] ?>" placeholder="00-00-00" />
                <div class="small"><?php echo form_error('matricula'); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <label>Descrição</label>
            <div class="control">
                <input type="text" class="form-control" name="descricao" value="<?php echo $artigos['descricao'] ?>" placeholder="Descrição multa"/>
                <div class="small"><?php echo form_error('descricao'); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <label>Entidade</label>
            <div class="control">
                <input type="text" class="form-control" name="entidade" value="<?php echo $artigos['entidade'] ?>" placeholder="entidade"/>
                <div class="small"><?php echo form_error('entidade'); ?></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>Valor Multa (€)</label>
            <div class="control">
                <input type="text" class="form-control" name="valor" value="<?php echo $artigos['valor']; ?>" placeholder="0.00" />
                <div class="small"><?php echo form_error('valor'); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <label>Tipo Multa</label>
            <div class="control">
                <select class="custom-select d-block w-100" name="tipo_multa">
                    <option selected value="<?php echo $artigos['tipo_multa']; ?>"><?php echo $artigos['tipo_multa']; ?></option>
                    <option value="Documentação">Documentação</option>
                    <option value="Infracção">Infracção</option>
                    <option value="Laboral">Laboral</option>
                    <option value="ANSR">ANSR</option>
                    <option value="Outra">Outra</option>
                </select>
                <div class="small"><?php echo form_error('tipo_multa'); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <label>Data Fecho</label>
            <div class="control">
                <input type="text" class="form-control" id="datepicker3" name="data_fecho" value="<?php echo $artigos['data_fecho'] ?>" placeholder="Ano-Mês-Dia"/>
                <div class="small"><?php echo form_error('data_fecho'); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <label>Valor Cobrado (€)</label>
            <div class="control">
                <input type="text" id="valor_cobrado" onchange="submitBday()" onclick="submitBday()" class="form-control" name="valor_cobrado" value="<?php echo $artigos['valor_cobrado'] ?>" placeholder="0.00" />
                <div class="small"><?php echo form_error('valor_cobrado'); ?></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>Custo Advogado (€)</label>
            <div class="control">
                <input type="text" class="form-control" onchange="submitBday()" onclick="submitBday()" id="custo_adv" name="custo_adv" value="<?php echo $artigos['custo_adv'] ?>" placeholder="0.00" />
                <div class="small"><?php echo form_error('custo_adv'); ?></div>
            </div>
        </div>

        <div class="col-md-3">
            <label>Resultado</label>
            <div class="control">
                <input type="text" id="resultado_multa" class="form-control" name="resultado" value="<?php echo $artigos['resultado'] ?>" placeholder="0.00" readonly />
                <div class="small"><?php echo form_error('resultado'); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <label>Local</label>
            <div class="control">
                <input type="text" class="form-control" name="local" value="<?php echo $artigos['local'] ?>" placeholder="Local" />
                <div class="small"><?php echo form_error('local'); ?></div>
            </div>
        </div>
        <div class="col-md-3">
            <label>Estado</label>
            <div class="control">
                <select class="custom-select d-block w-100" name="estado">
                    <option selected value="<?php echo $artigos['estado']; ?>"><?php echo $artigos['estado']; ?></option>
                    <option value="Em Curso">Em Curso</option>
                    <option value="Fechado">Fechado</option>
                </select>
                <div class="small"><?php echo form_error('estado'); ?></div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <label>Observações</label>
            <div class="control">
                <textarea type="text" class="form-control" name="observacoes" value="<?php echo $artigos['observacoes']; ?>"><?php echo $artigos['observacoes']; ?></textarea>
                <div class="small"><?php echo form_error('observacoes'); ?></div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Hidden Field-->
            <input type="hidden" name="categoria_artigo" value="<?php echo $artigos['categoria_artigo'] ?>" />
            <input type="hidden" name="visivel_artigo" value="<?php echo $artigos['visivel_artigo'] ?>" />
            <input type="hidden" name="utilizador_artigo" value="<?php echo $artigos['utilizador_artigo'] ?>" />
            <input type="hidden" name="criado_artigo" value="<?php echo $artigos['criado_artigo'] ?>" />
            <input type="hidden" name="modificado_artigo" value="<?php echo date("Y-m-d H:i:s"); ?>" />
            <input type="hidden" name="serial" value="<?php echo $artigos['serial'] ?>" />
        </div>
        <!-- close row -->
    </div>
    <!-- close container -->
</div>

</form>

<script>
    function submitBday() {
        var resultado = "";
        var Bdate = document.getElementById('valor_cobrado').value;
        var Bdate2 = document.getElementById('custo_adv').value;
        resultado += ~~ ((Bdate - Bdate2));
        document.getElementById('resultado_multa').setAttribute('value', resultado);
    }
</script>
