<?php
//$empresas[] = null;
?>
<?php
echo form_open('relatorios/create');
?>
<div class="container-fluid bg-light">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-6">
                <h1>Relatórios de Janeiro de 2021</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-primary" href="<?php echo base_url("/index.php/relatorios/"); ?>" >Cancelar</a>
                <button class="btn btn-success mx-auto">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!--
    <div class="row">

        <div class="col-md-4">
            <label for="analiseMensal">Período de Análise Mensal *</label>
            <input type="date" class="form-control" id="analiseMensal" name="periodo_analise" value="">
            <div class="small"><?php /*echo form_error('periodo_analise'); */?></div>
        </div>

        <div class="col-md-4">
            <div class="control-group required all-20 small-100 tiny-100">
                <label>Data da Análise *</label>
                <div class="control">
                    <input type="date" class="form-control" id="datepicker" name="data_analise" value="" placeholder="Ano-Mês-Dia" onchange="formatar()" required>
                    <input type="hidden" class="form-control" id="lblDataExtenso" name="lblDataExtenso" value="">
                    <div class="small"><?php /*echo form_error('data_analise'); */?></div>
                </div>
            </div>
        </div>

    </div>
    -->

    <h2 class="mt-4"><?php echo $relatorios['title']; ?></h2>
    <p><?php echo $relatorios['n_empresa']; ?></p>

    <hr>

    <script language="JavaScript">
        function toggle(source) {
            let checkboxes = document.querySelectorAll('[name="index[]"]');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>

    <div class="row">
        <div class="col-6">
            <div class="custom-control custom-checkbox">
                <div class="small"><?php echo form_error('index[]'); ?></div>
                <input type="checkbox" class="custom-control-input" id="selectAllCheckBox" onClick="toggle(this)" >
                <label class="custom-control-label text-dark" for="selectAllCheckBox">Seleccionar todos os Motoristas de pesados</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="">
            <?php
            $i = -1;
            foreach($motoristas as $motorista) {
                $i ++;
                ?>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="customCheck<?php echo $i ?>" name="index[]" value="<?php echo $i; ?>" class="custom-control-input" >
                    <label class="custom-control-label" for="customCheck<?php echo $i ?>"><?php echo $motorista['title']; ?></label>
                    <input type="hidden" name="n_empresa[]" id="selectText<?php echo $i ?>" value="<?php echo $motorista['data_nascimento']; ?>" >
                    <input type="hidden" name="title[]" id="selectCheckBox<?php echo $i ?>" value="<?php echo $motorista['nacionalidade']; ?>" >
                    <input type="" name="title[]" id="selectCheckBox<?php echo $i ?>" value="<?php echo $motorista['n_cliente']; ?>" >

                </div>
                <?php
            }
            ?>
            <div class="small"><?php echo form_error('title'); ?></div>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for=""></label>
                <input type="date" id="" name="" class="form-control">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for=""></label>
                <select id="" name="" class="form-control">
                    <option value="">xxxxx</option>
                </select>
            </div>
        </div>
        <div class="col-1">
            <div class="form-group">
                <a class="btn btn-primary" href="" class="form-control">-</a>
            </div>
        </div>
        <div class="col-1">
            <div class="form-group">
                <a class="btn btn-primary" href="">+</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <!-- Hidden Field-->
            <input type="" name="categoria_servicos" value="1" />
            <input type="" name="visivel_servicos" value="1" />
            <input type="" name="utilizador_servicos" value="<?php echo $user['id']; ?>" />
            <input type="" name="criado_servicos" value="<?php echo date("Y-m-d H:i:s"); ?>" />
            <input type="" name="modificado_servicos" value="<?php echo date("Y-m-d H:i:s"); ?>" />
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <a class="btn btn-primary" href="<?php echo base_url("/index.php/users/account/"); ?>" >Cancelar</a>
            <button class="btn btn-success mx-auto">Guardar</button>
        </div>
    </div>

    <!-- close container -->
</div>

</form>
</main>

<script>
    function formatar() {
        let data = $('#datepicker').datepicker('getDate');
        let extenso;
        data = new Date(data);
        let day = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"][data.getDay()];
        let date = data.getDate();
        let month = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"][data.getMonth()];
        let year = data.getFullYear();
        //console.log(data);
        document.getElementById('lblDataExtenso').setAttribute('value', `${date} de ${month} de ${year}`);
    }
</script>
