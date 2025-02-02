<?php
echo form_open('discos/create');
?>
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row pt-3 pb-3">
                <div class="col-12 col-md-6">
                    <h1>Abrir Relatório Mensal</h1>
                </div>
                <div class="col-12 col-md-6 text-right">
                    <a class="btn btn-primary" href="<?php echo base_url("/index.php/users/account/"); ?>" >Cancelar</a>
                    <button class="btn btn-success mx-auto">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label>Período de Análise Mensal *</label>
                <div class="control">
                    <select class="form-control" name="periodo_analise" required>
                        <option selected value="<?php //echo set_value('periodo-analise'); ?>">-- Período de Análise Mensal * --</option>
                        <option value="Janeiro de <?php echo date('Y'); ?>">Janeiro de <?php echo date('Y'); ?></option>
                        <option value="Fevereiro de <?php echo date('Y'); ?>">Fevereiro de <?php echo date('Y'); ?></option>
                        <option value="Marco de <?php echo date('Y'); ?>">Março de <?php echo date('Y'); ?></option>
                        <option value="Abril de  <?php echo date('Y'); ?>">Abril de <?php echo date('Y'); ?></option>
                        <option value="Maio de <?php echo date('Y'); ?>">Maio de <?php echo date('Y'); ?></option>
                        <option value="Junho de <?php echo date('Y'); ?>">Junho de <?php echo date('Y'); ?></option>
                        <option value="Julho de <?php echo date('Y'); ?>">Julho de <?php echo date('Y'); ?></option>
                        <option value="Agosto de <?php echo date('Y'); ?>">Agosto de <?php echo date('Y'); ?></option>
                        <option value="Setembro de <?php echo date('Y'); ?>">Setembro de <?php echo date('Y'); ?></option>
                        <option value="Outubro de <?php echo date('Y'); ?>">Outubro de <?php echo date('Y'); ?></option>
                        <option value="Novembro de <?php echo date('Y'); ?>">Novembro de <?php echo date('Y'); ?></option>
                        <option value="Dezembro de <?php echo date('Y'); ?>">Dezembro de <?php echo date('Y'); ?></option>
                    </select>
                </div>
                <div class="small"><?php echo form_error('periodo_analise'); ?></div>
            </div>

            <div class="col-md-4">
                <div class="control-group required all-20 small-100 tiny-100">
                    <label>Data da Análise *</label>
                    <div class="control">
                        <input type="text" class="form-control" id="datepicker" name="data_servicos" value="" placeholder="Ano-Mês-Dia" onchange="formatar()" required>
                        <input type="hidden" class="form-control" id="lblDataExtenso" name="lblDataExtenso" value="" >
                        <div class="small"><?php echo form_error('data_servicos'); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-4">Seleccionar Empresas para Emissão de Relatórios</h2>

        <hr>

        <script language="JavaScript">
            function toggle(source) {
                checkboxes = document.getElementsByName('title');
                for(var i=0, n=checkboxes.length;i<n;i++) {
                    checkboxes[i].checked = source.checked;
                }
            }
        </script>

        <div class="row">
            <div class="col">
                <div class="control">
                    <div class="form-check pt-2 pb-2">
                        <input type="checkbox" class="form-check-input" id="selectAllCheckBox" onClick="toggle(this)">
                        <label class="form-check-label text-dark" for="selectAllCheckBox">Seleccionar todas as Empresas com Motoristas de Pesados</label>
                    </div>
                    <?php
                    $i = 0;
                    foreach($contactos as $contacto) {
                        $i ++;
                        ?>
                        <div class="form-check pt-2 pb-2">
                            <input type="checkbox" name="title" class="form-check-input" id="selectCheckBox<?php echo $i ?>">
                            <label class="form-check-label" for="selectCheckBox<?php echo $i ?>"><?php echo $contacto['title']; ?></label>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="small"><?php echo form_error('title'); ?></div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
                <!-- Hidden Field-->
                <input type="text" name="categoria_servicos" value="1" />
                <input type="text" name="visivel_servicos" value="1" />
                <input type="text" name="utilizador_servicos" value="<?php echo $user['id']; ?>" />
                <input type="text" name="criado_servicos" value="<?php echo date("Y-m-d H:i:s"); ?>" />
                <input type="text" name="modificado_servicos" value="<?php echo date("Y-m-d H:i:s"); ?>" />
            </div>
        </div>

        <!-- close container -->
    </div>

</form>
</main>


<script>
    function formatar() {
        var data = $('#datepicker').datepicker('getDate');
        var extenso;
        data = new Date(data);

        var day = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"][data.getDay()];
        var date = data.getDate();
        var month = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"][data.getMonth()];
        var year = data.getFullYear();

        //console.log(data);
        document.getElementById('lblDataExtenso').setAttribute('value', `${date} de ${month} de ${year}`);
    }
</script>
