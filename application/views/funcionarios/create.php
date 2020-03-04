
<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Novo Funcionário</h3>
</div>
</div>
</div>
</div>

<script>
$( function() {
var availableTags = [
<?php foreach ($contactos as $contactos_item): ?>
"<?php echo $contactos_item['title']; ?>",
<?php endforeach;?>
];
$( "#tags" ).autocomplete({
  source: availableTags
});
});
</script>

<?php echo form_open('funcionarios/create', 'class="ink-form all-100 small-100 tiny-100"'); ?>
<form>

<div class="container">
<div class="row">
<div class="col-md-3">   
    <label>Nº Cliente</label>
    <div id="sel_depart" class="form-checks">
    <input type="text" id="saiu" class="form-control" readonly />
    </div>
</div>
    <!--
    <div class="control">
    <input type="text" id="tags" class="form-control" name="title" value="<?php //echo set_value('nome_servicos'); ?>" placeholder="Seleccione Formandos"/>
    <div class="small"><?php //echo form_error(''); ?></div>
    </div>
    <div class="col-md-3">
    <label>Nº Cliente</label>
    <div class="control">
    <input type="text" class="form-control" name="n_cliente" value="<?php //echo set_value('n_cliente'); ?>" readonly placeholder="Nº Cliente"/>
    <div class="small"><?php //echo form_error('n_cliente'); ?></div>    
    </div>
    </div>
    -->     
<div class="col-md-3">
    <label>Nome *</label>
    <div class="control">
    <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" placeholder="Nome Formando"/>
    <div class="small"><?php echo form_error('title'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Empresa *</label>
    <div class="control"> 
    <select id='sel_city' class="form-control" name="empresa">
        <option>-- Seleccionar Empresa --</option>
        <?php
        foreach($contactos as $contacto) {
            echo "<option value='".$contacto['title']."'>".$contacto['slug']."</option>";
        }
        ?>
    </select>

<!--<input type="text" id="tags" class="form-control" name="empresa" value="<?php //echo set_value('empresa'); ?>" placeholder="Nome Empresa"/>

<select class="form-control" name="empresa" class="form-control">
    <option value="" selected="selected"></option>
    <?php //foreach ($contactos as $contactos_item): ?>
    <option value="<?php //echo set_value('empresa'); ?>"><?php //echo $contactos_item['title']; ?></option>
    <?php //endforeach; ?>
</select>
-->
    <div class="small"><?php echo form_error('empresa'); ?></div>
    </div>
</div>
<div class="col-md-3">
    <label>Cliente</label>
    <div class="control">        
<!--<input type="text" class="form-control" name="cliente" value="<?php //echo set_value('cliente'); ?>" placeholder="Cliente"/>-->
    <select class="custom-select d-block w-100" name="cliente">
    <option selected value="<?php echo set_value('cliente'); ?>"></option>
    <option value="Sim">Sim</option>
    <option value="Nao">Nao</option>
    </select> 
    <div class="small"><?php echo form_error('cliente'); ?></div>    
    </div>
</div>
</div>


<div class="row">
<div class="col-md-3">
    <label>Cargo</label>
    <div class="control">
    <!-- <input type="text" class="form-control" name="cargo" value="<?php //echo set_value('cargo'); ?>" placeholder="Cargo"/>-->
    <select class="custom-select d-block w-100" name="cargo">
    <option selected value="<?php echo set_value('cargo'); ?>"></option>
    <?php foreach ($categorias_profissionais as $categorias_profissionais_item): ?>
    <option value="<?php echo $categorias_profissionais_item['title']; ?>"><?php echo $categorias_profissionais_item['title']; ?></option>
    <?php endforeach;?>
    </select>     
    <div class="small"><?php echo form_error('cargo'); ?></div>
    <div class="small"><a href="<?php echo site_url('categorias_profissionais/create/'); ?>" target="_blank">Adicionar Categoria Profissional</a></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Data de Início</label>
    <div class="control">
    <input type="text" id="datepicker" class="form-control" name="data_inicio" value="<?php echo set_value('data_inicio'); ?>" placeholder="Ano-Mês-Dia" />
    <div class="small"><?php echo form_error('data_inicio'); ?></div>    
    </div>
</div>


<div class="col-md-3">
    <label>Data de Demissão</label>
    <div class="control">        
    <input type="text" id="datepicker1" onchange="submitdemissao()" class="form-control" name="data_demissao" value="<?php echo set_value('data_demissao'); ?>" placeholder="Ano-Mês-Dia"/>
    <div class="small"><?php echo form_error('data_demissao'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Sexo</label>
    <div class="control">
    <select class="custom-select d-block w-100" name="sexo">
    <option selected value="<?php echo set_value('sexo'); ?>"></option>
    <option value="Feminino">Feminino</option>
    <option value="Masculino">Masculino</option>
    </select> 
    <!-- <input type="text" class="form-control" name="sexo" value="<?php //echo set_value('sexo'); ?>" placeholder="sexo" />-->
    <div class="small"><?php echo form_error('sexo'); ?></div>    
    </div>
</div>
</div>
<div class="row">
<div class="col-md-3">
    <label>Naturalidade</label>
    <div class="control">
    <input type="text" class="form-control" name="naturalidade" value="<?php echo set_value('naturalidade'); ?>" placeholder="Naturalidade"/>
    <div class="small"><?php echo form_error('naturalidade'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Nacionalidade</label>
    <div class="control">
    <input type="text" class="form-control" name="nacionalidade" value="<?php echo set_value('nacionalidade'); ?>" placeholder="Nacionalidade"/>
    <div class="small"><?php echo form_error('nacionalidade'); ?></div>    
    </div>
</div>

<div class="col-md-3">
    <label>Data Nascimento</label>
    <div class="control"> 
    <input type="text" id="datepicker2" onchange="submitBday(), ValidadeExameMedico()" onclick="submitBday(), ValidadeExameMedico()" class="form-control" name="data_nascimento" value="<?php echo set_value('data_nascimento'); ?>" placeholder="Ano-Mês-Dia" />
    <div class="small"><?php echo form_error('data_nascimento'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Idade</label>
    <div class="control">  
    <input type="text" id="resultBday2" class="form-control" name="idade" value="" placeholder="Idade" readonly />
    </div>
</div>
</div>


<div class="row">
<div class="col-md-3">
    <label>Documento de Identificacão</label>
    <div class="control">
    <input type="text" class="form-control" name="doc_identificacao" value="<?php echo set_value('doc_identificacao'); ?>" placeholder="Documento de Identificacão"/>
    <div class="small"><?php echo form_error('doc_identificacao'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Validade CC</label>
    <div class="control">        
    <input type="text" id="datepicker3" class="form-control" name="validade_identificacao" value="<?php echo set_value('validade_identificacao'); ?>" placeholder="Validade Identificação" />
    <div class="small"><?php echo form_error('validade_identificacao'); ?></div>    
    </div>
</div>

<div class="col-md-3">
    <label>Exame Médico</label>
    <div class="control">
    <input type="text" id="datepicker5" onchange="ValidadeExameMedico()" onclick="ValidadeExameMedico()" class="form-control" name="data_exame" value="<?php echo set_value('data_exame'); ?>" placeholder="Ano-Mês-Dia"/>
    <div class="small"><?php echo form_error('data_exame'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Validade Exame Médico</label>
    <input type="text" id="validade_exame" class="form-control" name="validade_exame_medico" value="" placeholder="Ano-Mês-Dia" readonly />
</div>
</div>

<div class="row">
<div class="col-md-3">
     <label>Validade CAM</label>
    <div class="control">
    <input type="text" id="datepicker7" class="form-control" name="validade_cam" value="<?php echo set_value('validade_cam'); ?>" placeholder="Ano-Mês-Dia"/>
    <div class="small"><?php echo form_error('validade_cam'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Nº Carta</label>
    <div class="control">        
    <input type="text" class="form-control" name="n_carta" value="<?php echo set_value('n_carta'); ?>" placeholder="Nº Carta"/>
    <div class="small"><?php echo form_error('n_carta'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Validade Carta</label>
    <div class="control">        
    <input type="text" id="datepicker4" class="form-control" name="validade_carta" value="<?php echo set_value('validade_carta'); ?>" placeholder="Ano-Mês-Dia" />
    <div class="small"><?php echo form_error('validade_carta'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Validade Cartão Condutor</label>
    <div class="control">        
    <input type="text" id="datepicker7" class="form-control" name="validade_cartao_conducao" value="<?php echo set_value('validade_cartao_conducao'); ?>" placeholder="Ano-Mês-Dia"/>
    <div class="small"><?php echo form_error('validade_cartao_conducao'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <!--
    <label>Relação Laboral</label>
    <div class="control">
    <select class="custom-select d-block w-100" name="laboral">
    <option selected value="Admitido">Admitido</option>
    <option value="Demitido">Demitido</option>
    </select>
    <div class="small"><?php //echo form_error('laboral'); ?></div>    
    </div>
    -->
</div>
</div>


<div class="row">
<div class="col-md-3">
    <label>Docs Digitalizados</label>
    <div class="control">        
    <select class="custom-select d-block w-100" name="docs_digitalizados">
    <option selected value="<?php echo set_value('docs_digitalizados'); ?>"></option>
    <option value="Sim">Sim</option>
    <option value="Nao">Nao</option>
    </select>
    <div class="small"><?php echo form_error('docs_digitalizados'); ?></div>   
    </div>
</div>    
<div class="col-md-3">
    <label>Telefone</label>
    <input type="text" id="datepicker7" class="form-control" name="telefone" value="<?php echo set_value('telefone'); ?>" placeholder="Telefone"/>
</div>
<div class="col-md-3">
    <label>Telefone Pessoal</label>
    <div class="control">        
    <input type="text" id="datepicker7" class="form-control" name="telefone_pessoal" value="<?php echo set_value('telefone_pessoal'); ?>" placeholder="Telefone Pessoal"/>
    <div class="small"><?php echo form_error('telefone_pessoal'); ?></div>   
    </div>
</div>
<div class="col-md-3">
    <label>E-mail</label>
    <div class="control">        
    <input type="text" id="datepicker7" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="E-mail"/>
    <div class="small"><?php echo form_error('email'); ?></div>   
    </div>
</div>
</div>


<div class="row">
<div class="col-md-6"> 
    <label>Observações</label>
    <div class="control">
        <textarea type="text" class="form-control" name="descricao" value="<?php set_value('descricao'); ?>" /></textarea>
        <div class="small"><?php echo form_error('descricao'); ?></div>    
    </div>
</div>
<div class="col-md-4">
    <!-- Hidden Field-->
    <input type="text" name="visivel_funcionarios" value="1" hidden />
    <input type="text" name="utilizador_funcionarios" value="<?php echo $user['id']; ?>" hidden/>
    <input type="text" name="criado_funcionarios" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
    <input type="text" name="modificado_funcionarios" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>  
</div>
<!-- close row -->
</div>
<!-- close container -->
</div>
        


<div class="container">
<div class="row">
<div class="col-md-8">
    <a class="btn btn-primary" href="<?php echo base_url("/index.php/funcionarios/index/"); ?>" >Cancelar</a>
    <button class="btn btn-primary">Guardar</button>
</div>

<!-- close row -->
</div>
<!-- close container -->
</div>

</form>
</main>



<script type='text/javascript'>
    // baseURL variable
    var baseURL= "<?php echo base_url();?>";
    
    $(document).ready(function(){
                
    // City change
    $('#sel_city').change(function(){
      var empresa = $(this).val();

      // AJAX request
      $.ajax({
        url:'<?=base_url()?>index.php/funcionarios/getidbyempresa',
        method: 'post',
        data: {empresa: empresa},
        dataType: 'json',
        success: function(response){

          // Remove options 
          //$('#sel_user').find('option').not(':first').remove();
          $('#sel_depart').find('input[class=custom-control-input]').remove();
          $('#sel_depart').find('input').remove();
          $('.form-checks').find('div').remove();
          //$('input[name=baz]').find('form').remove(':last');
          //$('input[name=baz]').find('input[name=baz]').remove();

          // Add options
          $.each(response,function(index,data){
            //$('#sel_depart').append('<option value="'+data['id']+'">'+data['title']+'</option>');
            $('#sel_depart').append(
                '<input type="text" id="saiu" class="form-control" name="n_cliente" '+
                'value="'+data['numero_cliente']+'" '+
                'placeholder="Nº Cliente" readonly />');
          });
        }
     });
   });
});

</script>

<script>
$(document).ready(function() {
    // set an element
    $("#date").val( moment().format('MMM D, YYYY') );
    // set a variable
    var today = moment().format('D MMM, YYYY');
});
function ValidadeExameMedico() {
    var Idade = document.getElementById('resultBday2').value;
    if(Idade<50){
        var ExameMedico = document.getElementById('datepicker5').value;
        var data = new Date(ExameMedico);
        var ExameMedico = moment(data).add(2,'year').format('YYYY-MM-DD');
    }
    if(Idade>=50 || Idade == 0){
        var ExameMedico = document.getElementById('datepicker5').value;
        var data = new Date(ExameMedico);
        var ExameMedico = moment(data).add(1,'year').format('YYYY-MM-DD');
    }
    document.getElementById('validade_exame').setAttribute('value', ExameMedico);
}
</script>

<script>
function submitBday() {
    var Q4A = "";
    var Bdate = document.getElementById('datepicker2').value;
    var data_nascimento = +new Date(Bdate);
    Q4A += ~~ ((Date.now() - data_nascimento) / (31557600000));
    document.getElementById('resultBday2').setAttribute('value', Q4A);
}
</script>


<script>
function submitdemissao() {
    var sel_city = document.getElementById('sel_city').value;
    var demissao = document.getElementById('datepicker1').value;
    //hidden field with Empresa ID
    //var empresademissao = document.getElementById('saiudd').value;
    if ( demissao !== null && demissao !== '') {
      var demissao = "Saiu";
      var sel_city = document.getElementById('sel_city').classList.add('readonly');
    }
    else {
      var sel_city = document.getElementById('sel_city').classList.remove('readonly');
    }
    document.getElementById('saiu').setAttribute('value', demissao);
}
</script>