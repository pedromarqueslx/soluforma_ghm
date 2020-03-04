<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Relatórios de Infracções</h3>
</div>
</div>
</div>
</div> 

<?php echo form_open('discos/create'); ?>
<form>

    <!--
    <div class="col-md-3">
        <div id="sel_n_cliente" class="sel_n_cliente" >
        <input type="" id="sel_n_cliente" class="form-control" name="area_servicos" />
        </div>
    </div>
    <div class="col-md-3">
        <div class="control">
            <div id="conteudos" class="conteudos">
                <textarea type="text" id="conteudos" class="form-control" name="conteudos_servicos" rows="3" readonly></textarea>
            </div>
        </div>
    </div>
    -->

<div class="container">

<div class="row">

<div class="col-md-4">
    <label>Período de Análise Mensal *</label>
    <div class="control">
        <select class="form-control" name="periodo_analise" required>
            <option selected value="<?php //echo set_value('periodo-analise'); ?>">-- Período de Análise Mensal * --</option>
            <option value="Janeiro de 2019">Janeiro de 2019</option>
            <option value="Fevereiro de 2019">Fevereiro de 2019</option>
            <option value="Marco de 2019">Março de 2019</option>
            <option value="Abril de  2019">Abril de 2019</option>
            <option value="Maio de 2019">Maio de 2019</option>
            <option value="Junho de 2019">Junho de 2019</option>
            <option value="Julho de 2019">Julho de 2019</option>
            <option value="Agosto de 2019">Agosto de 2019</option>
            <option value="Setembro de 2019">Setembro de 2019</option>
            <option value="Outubro de 2019">Outubro de 2019</option>
            <option value="Novembro de 2019">Novembro de 2019</option>
            <option value="Dezembro de 2019">Dezembro de 2019</option>
        </select>
    </div>
    <div class="small"><?php echo form_error('periodo_analise'); ?></div>
</div>

    <!--
<div class="col-md-4">
    <label>Infracções *</label>
    <div class="control">
        <select id='sel_id' class="form-control" name="">
            <option value="" selected="selected">-- Infracções * --</option>
            <?php //foreach ($infracoes as $infracoes_item): ?>
                <option value="<?php //echo $infracoes_item['id']; ?>"><?php //echo $infracoes_item['title']; ?> </option>
            <?php //endforeach;?>
        </select>
    </div>
    <div class="small"><?php //echo form_error('area_servicos'); ?></div>
</div>
    -->

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

<hr>

<div class="row">
<div class="col-md-4">   
    <label>Seleccionar Empresa e associar Funcionários *</label>
    <div class="control">
    <select id='sel_city' class="form-control" name="title">
        <option value="" selected="selected">-- Seleccionar Empresa --</option>
        <?php
        foreach($contactos as $contacto) {
            echo "<option value='".$contacto['title']."'>".$contacto['slug']."</option>";
        }
        ?>
    </select>
    </div>
    <div class="small"><?php echo form_error('title'); ?></div>
</div>


</div>
    <div id="sel_depart" class="form-checks">
    <!--<div class="small"><?php //echo form_error('formandos_servicos[]'); ?></div>-->
    </div>
<div class="row">
<div class="col-md-4">
    <!-- Hidden Field-->
    <input type="text" name="categoria_servicos" value="1" hidden/>
    <input type="text" name="visivel_servicos" value="1" hidden/>
    <input type="text" name="utilizador_servicos" value="<?php echo $user['id']; ?>" hidden/>
    <input type="text" name="criado_servicos" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
    <input type="text" name="modificado_servicos" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
</div>
</div>

<!-- close container -->
</div>


<div class="container">
<div class="row">
<div class="col-md-8">
    <a class="btn btn-primary" href="<?php echo base_url("/index.php/users/account/"); ?>" >Cancelar</a>
    <button class="btn btn-primary">Guardar</button>    
</div>
<div class="col-md-4">
</div>
</div>
</div>

</form>
</main>

<!-- JQERY load on head  -->
<script type='text/javascript'>
    // baseURL variable
    var baseURL= "<?php echo base_url();?>";
    $(document).ready(function(){
    // City change
    $('#sel_city').change(function(){
      var empresa = $(this).val();
      // AJAX request
      $.ajax({
        url:'<?=base_url()?>index.php/servicos/getFuncionariosbyempresa',
        method: 'post',
        data: {empresa: empresa},
        dataType: 'json',
        success: function(response){
          // Remove options 
          $('#sel_depart').find('input').remove();
          $('#sel_depart').find('label').remove();
          $('.form-checks').find('div').remove();
          // Add options
          $.each(response,function(index,data){
          $('#sel_depart').append (

        '<div class="form-check">'+
        '<hr>'+
        '<label class="custom-control custom-checkbox ">'+
        '<input class="custom-control-input" type="checkbox" id="checkAll'+data['id']+'">'+
        '<span class="custom-control-indicator"></span>'+
        '<span class="custom-control-description">'+data['title']+'</span>'+
        '</label>'+
        '<input type="checkbox" class="checkItem'+data['id']+'" name="empresa_id_servicos[]" value="'+data['n_cliente']+'" hidden >'+
        '<input type="checkbox" class="checkItem'+data['id']+'" name="formandos_servicos[]" value="'+data['id']+'" hidden >'+
        '<input type="checkbox" class="checkItem'+data['id']+'" name="nome_funcionario_servicos[]" value="'+data['title']+'" hidden >'+
        '<input type="checkbox" class="checkItem'+data['id']+'" name="naturalidade_servicos[]" value="'+data['naturalidade']+'" hidden >'+
        '<input type="checkbox" class="checkItem'+data['id']+'" name="data_nascimento_servicos[]" value="'+data['data_nascimento']+'" hidden >'+
        '<input type="checkbox" class="checkItem'+data['id']+'" name="nacionalidade_servicos[]" value="'+data['nacionalidade']+'" hidden >'+
        '<input type="checkbox" class="checkItem'+data['id']+'" name="doc_identificacao_servicos[]" value="'+data['doc_identificacao']+'" hidden >'+
        '<input type="checkbox" class="checkItem'+data['id']+'" name="validade_identificacao_servicos[]" value="'+data['validade_identificacao']+'" hidden >'+
        '<input type="checkbox" class="checkItem'+data['id']+'" name="" value="" hidden>'+
        '<div class="row">'+
        '<input class="form-control col-md-3" type="hidden" name="" value="'+data['title']+'" >'+

            '<input class="form-control col-md-3" type="date" name="registo_do_dia[]" value="" >'+

            '<select id="sel_id" class="form-control col-md-3" name="id_infracao[]" >'+
              '<option value="0" selected="selected">Seleccione Infracção </option>'+
              '<option value="48">Sem Infracções Detectadas </option>'+
              '<option value="31"> Disco mal preenchido </option>'+
              '<option value="43"> Intervalo de descanso </option>'+
              '<option value="40">Abertura de tacógrafo </option>'+
              '<option value="27">Abertura ou Fecho de Turno incorretamente </option>'+
              '<option value="34">Deslocações </option>'+
              '<option value="30">Disco rasurado </option>'+
              '<option value="29">Dois discos no mesmo dia </option>'+
              '<option value="38">Dois FDS reduzidos seguidos </option>'+
              '<option value="47">Excesso de condução diária </option>'+
              '<option value="45">Excesso de condução quinzenal </option>'+
              '<option value="44">Excesso de condução semanal </option>'+
              '<option value="46">Excesso de tempo de trabalho semanal </option>'+
              '<option value="41">Excesso de trabalho sem pausas </option>'+
              '<option value="32">Falta de comutação </option>'+
              '<option value="37">Falta de descanso diário </option>'+
              '<option value="35">Falta de descanso diário Regular </option>'+
              '<option value="36">Falta de descanso diário Trip Multipla </option>'+
              '<option value="33">Falta de entradas adicionais </option>'+
              '<option value="39">Falta de pausa </option>'+
              '<option value="42">Limites e duração do trabalho </option>'+
              '<option value="28">Mais de 24h no interior do tacógrafo </option>'+
            '</select>'+

            '<input class="form-control col-md-3" type="date" name="registo_do_dia_1[]" value="" >'+

             '<select id="sel_id" class="form-control col-md-3" name="id_infracao_1[]" >'+
              '<option value="0" selected="selected">Seleccione Infracção </option>'+
              '<option value="48">Sem Infracções Detectadas </option>'+
              '<option value="31"> Disco mal preenchido </option>'+
              '<option value="43"> Intervalo de descanso </option>'+
              '<option value="40">Abertura de tacógrafo </option>'+
              '<option value="27">Abertura ou Fecho de Turno incorretamente </option>'+
              '<option value="34">Deslocações </option>'+
              '<option value="30">Disco rasurado </option>'+
              '<option value="29">Dois discos no mesmo dia </option>'+
              '<option value="38">Dois FDS reduzidos seguidos </option>'+
              '<option value="47">Excesso de condução diária </option>'+
              '<option value="45">Excesso de condução quinzenal </option>'+
              '<option value="44">Excesso de condução semanal </option>'+
              '<option value="46">Excesso de tempo de trabalho semanal </option>'+
              '<option value="41">Excesso de trabalho sem pausas </option>'+
              '<option value="32">Falta de comutação </option>'+
              '<option value="37">Falta de descanso diário </option>'+
              '<option value="35">Falta de descanso diário Regular </option>'+
              '<option value="36">Falta de descanso diário Trip Multipla </option>'+
              '<option value="33">Falta de entradas adicionais </option>'+
              '<option value="39">Falta de pausa </option>'+
              '<option value="42">Limites e duração do trabalho </option>'+
              '<option value="28">Mais de 24h no interior do tacógrafo </option>'+
             '</select>'+

              '<input class="form-control col-md-3" type="date" name="registo_do_dia_2[]" value="" >'+

              '<select id="sel_id" class="form-control col-md-3" name="id_infracao_2[]" >'+
              '<option value="0" selected="selected">Seleccione Infracção </option>'+
              '<option value="48">Sem Infracções Detectadas </option>'+
                  '<option value="31"> Disco mal preenchido </option>'+
                  '<option value="43"> Intervalo de descanso </option>'+
                  '<option value="40">Abertura de tacógrafo </option>'+
                  '<option value="27">Abertura ou Fecho de Turno incorretamente </option>'+
                  '<option value="34">Deslocações </option>'+
                  '<option value="30">Disco rasurado </option>'+
                  '<option value="29">Dois discos no mesmo dia </option>'+
                  '<option value="38">Dois FDS reduzidos seguidos </option>'+
                  '<option value="47">Excesso de condução diária </option>'+
                  '<option value="45">Excesso de condução quinzenal </option>'+
                  '<option value="44">Excesso de condução semanal </option>'+
                  '<option value="46">Excesso de tempo de trabalho semanal </option>'+
                  '<option value="41">Excesso de trabalho sem pausas </option>'+
                  '<option value="32">Falta de comutação </option>'+
                  '<option value="37">Falta de descanso diário </option>'+
                  '<option value="35">Falta de descanso diário Regular </option>'+
                  '<option value="36">Falta de descanso diário Trip Multipla </option>'+
                  '<option value="33">Falta de entradas adicionais </option>'+
                  '<option value="39">Falta de pausa </option>'+
                  '<option value="42">Limites e duração do trabalho </option>'+
                  '<option value="28">Mais de 24h no interior do tacógrafo </option>'+
              '</select>'+

              '<input class="form-control col-md-3" type="date" name="registo_do_dia_3[]" value="" >'+

              '<select id="sel_id" class="form-control col-md-3" name="id_infracao_3[]" >'+
              '<option value="0" selected="selected">Seleccione Infracção </option>'+
              '<option value="48">Sem Infracções Detectadas </option>'+
                  '<option value="31"> Disco mal preenchido </option>'+
                  '<option value="43"> Intervalo de descanso </option>'+
                  '<option value="40">Abertura de tacógrafo </option>'+
                  '<option value="27">Abertura ou Fecho de Turno incorretamente </option>'+
                  '<option value="34">Deslocações </option>'+
                  '<option value="30">Disco rasurado </option>'+
                  '<option value="29">Dois discos no mesmo dia </option>'+
                  '<option value="38">Dois FDS reduzidos seguidos </option>'+
                  '<option value="47">Excesso de condução diária </option>'+
                  '<option value="45">Excesso de condução quinzenal </option>'+
                  '<option value="44">Excesso de condução semanal </option>'+
                  '<option value="46">Excesso de tempo de trabalho semanal </option>'+
                  '<option value="41">Excesso de trabalho sem pausas </option>'+
                  '<option value="32">Falta de comutação </option>'+
                  '<option value="37">Falta de descanso diário </option>'+
                  '<option value="35">Falta de descanso diário Regular </option>'+
                  '<option value="36">Falta de descanso diário Trip Multipla </option>'+
                  '<option value="33">Falta de entradas adicionais </option>'+
                  '<option value="39">Falta de pausa </option>'+
                  '<option value="42">Limites e duração do trabalho </option>'+
                  '<option value="28">Mais de 24h no interior do tacógrafo </option>'+
              '</select>'+

        '</div>'+
        '</div>');

        $("#checkAll"+data['id']).click(function () {
        $('.checkItem'+data['id']).not(this).prop('checked', this.checked);

          });
          });
        }
     });
   });

        // Update Conteudos By ID
        $('#sel_id').change( function() {
            var id = $(this).val();
            // AJAX request
            $.ajax({
                url:'<?=base_url()?>index.php/discos/getInfracoesbyIDareaformacao',
                method: 'post',
                //data: {title: title},
                data: {id: id},
                dataType: 'json',
                success: function(response){
                        
            // Remove options
            $('.nome').find('textarea').remove();
            $('.horas').find('textarea').remove();
            $('.conteudos').find('textarea').remove();
            $('.sel_n_cliente').find('input').remove();
            // Add options
            $.each(response,function(index,data){
                $('#nome').append('<textarea type="text" class="form-control" name="nome_servicos" value="'+ data['nome_conteudos'] +'" placeholder="Nome" rows="3" readonly>'+ data['nome_conteudos'] +'</textarea>');
                $('#horas').append('<textarea type="text" class="form-control" name="horas_servicos" value="'+ data['horas_conteudos'] +'" placeholder="Horas" rows="3" readonly >'+ data['horas_conteudos'] +'</textarea>');
                //$('#sel_n_cliente').append('<input type="" class="form-control" name="area_servicos" value="'+ data['title'] +'" readonly >');
                //$('#conteudos').append('<textarea type="text" class="form-control" name="conteudos_servicos" value="'+ data['infracoes_infracoes'] +'" placeholder="Horas" rows="3" readonly >'+ data['infracoes_infracoes'] +'</textarea>');
            });
        }
    });
});

});

</script>

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