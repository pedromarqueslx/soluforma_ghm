<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Emissão de Novos Certificados</h3>
</div>
</div>
</div>
</div> 

<?php echo form_open('servicos/create'); ?>
<form>
<div class="container">
<div class="row">

<div class="col-md-4">
    <label>Área de Formação *</label>
    <div class="control">
        <select id='sel_id' class="form-control" name="area_servicos">
            <option value="" selected="selected">-- Seleccionar Área de Formação --</option>
            <?php foreach ($conteudos as $conteudos_item): ?>
            <option value="<?php echo $conteudos_item['title']; ?>"><?php echo $conteudos_item['title']; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="small"><?php echo form_error('area_servicos'); ?></div>
</div>
<div class="col-md-4">
    <label>Formador *</label>
    <div class="control"> 
        <select class="form-control" name="formadores_servicos" class="form-control">
            <option value="" selected="selected">-- Seleccionar Formador --</option>
            <?php foreach ($formadores as $formadores_item): ?>
            <option value="<?php echo $formadores_item['title']; ?>"><?php echo $formadores_item['title']; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="small"><?php echo form_error('formadores_servicos'); ?></div>
</div> 
<div class="col-md-4"> 
    <div class="control-group required all-20 small-100 tiny-100">
    <label>Data da Formação *</label>
    <?php foreach ($login_date as $login_date_item): ?>
    <div class="control">
        <input type="text" class="form-control" id="datepicker" name="data_servicos" value="" placeholder="Ano-Mês-Dia"  />
        <div class="small"><?php echo form_error('data_servicos'); ?></div>
    </div>
    <?php endforeach;?>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-4">
    <label>Nome</label>
    <div class="control">
    <div id="nome" class="nome">
    <textarea type="text" id="nome" class="form-control" name="nome_servicos" placeholder="Nome" rows="3" readonly ></textarea>
    <!-- <textarea type="text" id="nome" class="form-control" name="nome_servicos" value="<?php //set_value('nome_servicos'); ?>" placeholder="Nome" /></textarea>-->
    </div>
    </div>    
</div>    
<div class="col-md-4">
    <label>Horas</label>
    <div class="control">
    <div id="horas" class="horas">
    <textarea type="text" id="horas" class="form-control" name="horas_servicos" placeholder="Horas" rows="3" readonly ></textarea>
    <!-- <textarea type="text" id="horas" class="form-control" name="horas_servicos" value="<?php //set_value('horas_servicos'); ?>" placeholder="Horas" /></textarea> -->
    </div>
    </div>
</div>
<div class="col-md-4">                    
    <label>Conteúdos Programáticos</label>
    <div class="control">
    <div id="conteudos" class="conteudos">
    <textarea type="text" id="conteudos" class="form-control" name="conteudos_servicos" placeholder="Conteúdos Programáticos" rows="3" readonly /></textarea>
    <!-- <textarea type="text" id="conteudos" class="form-control" name="conteudos_servicos" value="<?php //set_value('conteudos_servicos'); ?>" placeholder="Conteúdos Programáticos" rows="3" /></textarea>-->
    </div>
    </div>
</div>
</div>

<hr>

<div class="row">
<div class="col-md-4">   
    <label>Seleccionar Empresa e associar Funcionários*</label>
    <div class="control">
    <select id='sel_city' class="form-control" name="title" >
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
          $('#sel_depart').find('input[class=custom-control-input]').remove();
          $('#sel_depart').find('label').remove();
          $('.form-checks').find('div').remove();
          // Add options
          $.each(response,function(index,data){

                $('#sel_depart').append(
                '<div class="form-check">'+
                '<hr>'+
                '<label class="custom-control custom-checkbox ">'+
                '<input class="custom-control-input" type="checkbox" name="formandos_servicos[]" value="'+data['id']+'">'+
                '<span class="custom-control-indicator"></span>'+
                '<span class="custom-control-description">'+data['title']+'</span>'+
                '</label>'+

                //'<div class="container">'+
                '<div class="row">'+

                '<input class="form-control col-md-3" type="text" name="nome_funcionario_servicos[]" value="'+data['title']+'" hidden >'+

                '<input class="form-control col-md-3" type="text" name="naturalidade_servicos[]" value="'+data['naturalidade']+'" placeholder="Naturalidade">'+
                '<input class="form-control col-md-3" type="text" name="data_nascimento_servicos[]" value="'+data['data_nascimento']+'" placeholder="Data Nascimento">'+
                '<input class="form-control col-md-3" type="text" name="nacionalidade_servicos[]" value="'+data['nacionalidade']+'" placeholder="Nacionalidade">'+
                '<input class="form-control col-md-3" type="text" name="doc_identificacao_servicos[]" value="'+data['doc_identificacao']+'" placeholder="Documento de Identificacão">'+
                '<input class="form-control col-md-3" type="text" name="validade_identificacao_servicos[]" value="'+data['validade_identificacao']+'" placeholder="Validade CC">'+

                '<a class="btn btn-outline-primary" href="'+
                '<?=base_url()?>index.php/funcionarios/edit/'+data['id']+
                '" target="_blank">Ficha Funcionário</a>'+

                //'</div>'+
                '</div>'+
                
                '</div>');
          });
        }
     });
   });

            $('#sel_id').change(function(){
                var title = $(this).val();
                // AJAX request
                $.ajax({
                    url:'<?=base_url()?>index.php/servicos/getConteudosbyareaformacao',
                    method: 'post',
                    data: {title: title},
                    dataType: 'json',
                    success: function(response){
                        
                        // Remove options
                        $('.nome').find('textarea').remove();
                        $('.horas').find('textarea').remove();
                        $('.conteudos').find('textarea').remove();
                        //$('.horas').find('div').remove();

                        // Add options
                        $.each(response,function(index,data){
                            $('#nome').append('<textarea type="text" class="form-control" name="nome_servicos" value="'+ data['nome_conteudos'] +'" placeholder="Nome" rows="3" readonly>'+ data['nome_conteudos'] +'</textarea>');
                            $('#horas').append('<textarea type="text" class="form-control" name="horas_servicos" value="'+ data['horas_conteudos'] +'" placeholder="Horas" rows="3" readonly >'+ data['horas_conteudos'] +'</textarea>');
                            $('#conteudos').append('<textarea type="text" class="form-control" name="conteudos_servicos" value="'+ data['conteudos_conteudos'] +'" placeholder="Horas" rows="3" readonly >'+ data['conteudos_conteudos'] +'</textarea>');
                        });
                    }
                });
            });

});
</script>