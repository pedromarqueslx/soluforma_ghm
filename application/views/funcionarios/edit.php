
<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Ficha de Funcionário</h3>
</div>
</div>
</div>
</div>

<?php echo form_open('funcionarios/edit/'.$funcionarios_item['id']); ?>

<form >
<input type="hidden" id="saiudd" value="<?php echo $funcionarios_item['n_cliente'] ?>" name="n_cliente_temp" />
<div class="container">
<div class="row">
<div class="col-md-3">   
    <label>Nº Cliente *</label>
    <div id="sel_depart" class="form-checks">
    <input type="text" id="saiu" class="form-control" value="<?php echo $funcionarios_item['n_cliente'] ?>" name="n_cliente" readonly />
    </div>
</div>
<div class="col-md-3">
    <label>Nome *</label>
    <!--<p class="half-vertical-space"><?php //echo $funcionarios_item['title'] ?></p>-->
    <input type="text" class="form-control" name="title" value="<?php echo $funcionarios_item['title'] ?>" >
    <div class="small"><?php echo form_error('title'); ?></div>   
</div>
<div class="col-md-3">
    <label>Empresa *</label>
    <div class="control">
        <select id='sel_city' class="custom-select d-block w-100 " name="empresa">
        <option selected value="<?php echo $funcionarios_item['empresa'] ?>"><?php echo $funcionarios_item['empresa']; ?></option>
        <?php
        foreach($contactos as $contacto) {
            echo "<option value='".$contacto['title']."'>".$contacto['slug']."</option>";
        }
        ?>
        <!--<input type="text" value="<?php //echo $funcionarios_item['empresa']; ?>" name="empresa" >-->
    </select>
    <div class="small"><?php echo form_error('empresa'); ?></div>   
    </div>
</div>
<div class="col-md-3">
    <label>Cliente</label>
    <div class="control">        
    <select class="custom-select d-block w-100" name="cliente">
    <option selected value="<?php echo $funcionarios_item['cliente']; ?>"><?php echo $funcionarios_item['cliente']; ?></option>
    <option value="Sim">Sim</option>
    <option value="Não">Não</option> 
    </select>  
    <div class="small"><?php echo form_error('cliente'); ?></div>   
    </div>
</div>
</div>


<div class="row">
<div class="col-md-3">
    <label>Cargo</label>
    <select class="custom-select d-block w-100" name="cargo">
    <option selected value="<?php echo $funcionarios_item['cargo']; ?>"><?php echo $funcionarios_item['cargo']; ?></option>
    <?php foreach ($categorias_profissionais as $categorias_profissionais_item): ?>
    <option value="<?php echo $categorias_profissionais_item['title']; ?>"><?php echo $categorias_profissionais_item['title']; ?></option>
    <?php endforeach;?>
    </select> 
    <div class="small"><a href="<?php echo site_url('categorias_profissionais/create/'); ?>" target="_blank">Adicionar Categoria Profissional</a></div>    
</div>
<div class="col-md-3">
    <label>Data de Início</label>
    <div class="control">        
    <input type="text" id="datepicker" class="form-control" name="data_inicio" value="<?php echo $funcionarios_item['data_inicio'] ?>"   />
    <div class="small"><?php echo form_error('data_inicio'); ?></div>   
    </div>
</div>

<div class="col-md-3">
    <label>Data de Demissão</label>
    <div class="control">
    <input type="text" id="datepicker1" onchange="submitdemissao()" onclick="submitdemissao()" class="form-control" name="data_demissao" value="<?php echo $funcionarios_item['data_demissao'] ?>" >
    </div>
</div>
<div class="col-md-3">
    <label>Sexo</label>
    <div class="control">        
<!-- <input type="text" class="form-control" name="sexo" value="<?php //echo $funcionarios_item['sexo'] ?>" /> -->
    <select class="custom-select d-block w-100" name="sexo">
    <option selected value="<?php echo $funcionarios_item['sexo']; ?>"><?php echo $funcionarios_item['sexo']; ?></option>
    <option value="Feminino">Feminino</option>
    <option value="Masculino">Masculino</option>
    </select> 
    <div class="small"><?php echo form_error('sexo'); ?></div>   
    </div>
</div>
</div>


<div class="row">
<div class="col-md-3">
    <label>Naturalidade</label>
    <input type="text" class="form-control" name="naturalidade" value="<?php echo $funcionarios_item['naturalidade'] ?>" />
</div>
<div class="col-md-3">
    <label>Nacionalidade</label>
    <div class="control">        
    <input type="text" class="form-control" name="nacionalidade" value="<?php echo $funcionarios_item['nacionalidade'] ?>"   />
    <div class="small"><?php echo form_error('nacionalidade'); ?></div>   
    </div>
</div>

<div class="col-md-3">
    <label>Data Nascimento</label>
    <div class="control">
    <input type="text" id="datepicker2" onchange="submitBday(); ValidadeExameMedico()" onclick="submitBday(); ValidadeExameMedico()" class="form-control" name="data_nascimento" value="<?php echo $funcionarios_item['data_nascimento'] ?>" />
    <div class="small"><?php echo form_error('data_nascimento'); ?></div>   
    </div>
</div>
<div class="col-md-3">
    <label>Idade</label>
    <div class="control">
    <input type="text" id="resultBday2" class="form-control" name="idade" value="<?php echo $funcionarios_item['idade']; ?>" readonly />
    </div>
</div>
</div>



<div class="row">
<div class="col-md-3">
    <label>Documento de Identificacão</label>
    <input type="text" class="form-control" name="doc_identificacao" value="<?php echo $funcionarios_item['doc_identificacao'] ?>" />
</div> 
<div class="col-md-3">
    <label>Validade CC</label>
    <div class="control">
    <input type="text" id="datepicker3" class="form-control" name="validade_identificacao" value="<?php echo $funcionarios_item['validade_identificacao'] ?>" placeholder="Ano-Mês-Dia" />
    <div class="small"><?php echo form_error('validade_identificacao'); ?></div>   
    </div>
</div>

<div class="col-md-3">
    <label>Exame Médico</label>
    <div class="control">        
    <input type="text" id="datepicker5" onchange="ValidadeExameMedico()" onclick="ValidadeExameMedico()" class="form-control" name="data_exame" value="<?php echo $funcionarios_item['data_exame'] ?>" placeholder="Ano-Mês-Dia" />
    <div class="small"><?php echo form_error('data_exame'); ?></div>   
    </div>
</div>
<div class="col-md-3">
    <label>Validade Exame Médico</label>
    <input type="text" id="validade_exame" class="form-control" name="validade_exame_medico" value="<?php echo $funcionarios_item['validade_exame_medico'] ?>" placeholder="Ano-Mês-Dia" readonly />
</div>
</div>


<div class="row">
<div class="col-md-3">
    <label>Validade CAM</label>
    <input type="text" id="datepicker7" class="form-control" name="validade_cam" value="<?php echo $funcionarios_item['validade_cam'] ?>" placeholder="Ano-Mês-Dia" />
</div> 
<div class="col-md-3">
    <label>Nº Carta</label>
    <div class="control">        
    <input type="text" class="form-control" name="n_carta" value="<?php echo $funcionarios_item['n_carta'] ?>"   />
    <div class="small"><?php echo form_error('n_carta'); ?></div>   
    </div>
</div>
<div class="col-md-3">
    <label>Validade Carta</label>
    <div class="control">        
    <input type="text" id="datepicker4" class="form-control" name="validade_carta" value="<?php echo $funcionarios_item['validade_carta'] ?>" placeholder="Ano-Mês-Dia" />
    <div class="small"><?php echo form_error('validade_carta'); ?></div>   
    </div>
</div> 
<div class="col-md-3">
    <label>Validade Cartão Condutor</label>
    <div class="control">        
    <input type="text" id="datepicker7" class="form-control" name="validade_cartao_conducao" value="<?php echo $funcionarios_item['validade_cartao_conducao'] ?>" placeholder="Ano-Mês-Dia" />
    <div class="small"><?php echo form_error('validade_cartao_conducao'); ?></div>   
    </div>
</div>
<div class="col-md-3">
    <!--
    <label>Relação Laboral</label>
    <div class="control">        
    <select class="custom-select d-block w-100" name="laboral" >
    <option selected value="<?php //echo $funcionarios_item['laboral']; ?>"><?php //echo $funcionarios_item['laboral']; ?></option>
    <option value="Admitido">Admitido</option>
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
<!-- <input type="text" class="form-control" name="docs_digitalizados" value="<?php //echo $funcionarios_item['docs_digitalizados'] ?>" /> -->
    <select class="custom-select d-block w-100" name="docs_digitalizados">
    <option selected value="<?php echo $funcionarios_item['docs_digitalizados']; ?>"><?php echo $funcionarios_item['docs_digitalizados']; ?></option>
    <option value="Sim">Sim</option>
    <option value="Não">Não</option>
    </select> 
    <div class="small"><?php echo form_error('docs_digitalizados'); ?></div>   
    </div>
</div>    
<div class="col-md-3">
    <label>Telefone</label>
    <input type="text" class="form-control" name="telefone" value="<?php echo $funcionarios_item['telefone'] ?>" />
</div>
<div class="col-md-3">
    <label>Telefone Pessoal</label>
    <div class="control">        
    <input type="text" class="form-control" name="telefone_pessoal" value="<?php echo $funcionarios_item['telefone_pessoal'] ?>"   />
    <div class="small"><?php echo form_error('telefone_pessoal'); ?></div>   
    </div>
</div>
<div class="col-md-3">
    <label>E-mail</label>
    <div class="control">        
    <input type="text" class="form-control" name="email" value="<?php echo $funcionarios_item['email'] ?>"   />
    <div class="small"><?php echo form_error('email'); ?></div>   
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <label>Observações</label>
    <div class="control">
        <textarea type="text" class="form-control" name="descricao" value="<?php echo $funcionarios_item['descricao']; ?>" /><?php echo $funcionarios_item['descricao']; ?></textarea>
        <div class="small"><?php echo form_error('descricao'); ?></div>    
    </div>
</div>
<div class="col-md-4">
    <!-- Hidden Field-->
    <input type="text" name="visivel_funcionarios" value="1" hidden/>
    <input type="text" name="utilizador_funcionarios" value="<?php echo $user['id']; ?>" hidden/>
    <input type="text" name="criado_funcionarios" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
    <input type="text" name="modificado_funcionarios" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>  
</div>
<!-- close container -->
</div>


<div class="row">
<div class="col-md-8">
    <?php
        $segment_1 = $this->uri->segment(1);
        $segment = $this->uri->segment(2);
        $segment_3 = $this->uri->segment(3);
        //echo $segment_3;
    ?>
    <a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo $segment_1; ?>/delete/<?php echo $segment_3; ?>" onClick="return confirm('Quer mesmo apagar o registo?')" > Apagar</a>
    <a class="btn btn-primary" href="<?php echo base_url("/index.php/funcionarios/pdf/".$segment_3); ?>" target="_blank" >PDF</a>
    <button class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
</div>

</div>
</form>
</main>


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
} );
</script>

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

          // Add options
          $.each(response,function(index,data){
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
/*
function ResetDataDemissao() {
    var demissao = '0000-00-00';
    document.getElementById('datepicker1').setAttribute('value', demissao);
    }
}
*/
</script>

<script>
function submitdemissao() {
    var sel_city = document.getElementById('sel_city').value;
    var demissao = document.getElementById('datepicker1').value;
    //hidden field with Empresa ID
    var empresademissao = document.getElementById('saiudd').value;
    if ( demissao !== null && demissao !== '' && demissao !== '0000-00-00'  ) {
      var demissao = "Saiu";
      var sel_city = document.getElementById('sel_city').classList.add('readonly');
    }
    else {
      var demissao = empresademissao;
      var sel_city = document.getElementById('sel_city').classList.remove('readonly');
    }
    document.getElementById('saiu').setAttribute('value', demissao);
}
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
    /*
    let Q4A = "";
    let Bdate = document.getElementById('datepicker2').value;
    let data_nascimento = +new Date(Bdate);
    Q4A += ~~ ((Date.now() - data_nascimento) / (31557600000));
    document.getElementById('resultBday2').setAttribute('value', Q4A);
    */

    var today = new Date();
    //var birthDate = new Date(dateString);
    let Bdate = document.getElementById('datepicker2').value;
    var birthDate = new Date(Bdate);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    document.getElementById('resultBday2').setAttribute('value', age);

}

</script>

