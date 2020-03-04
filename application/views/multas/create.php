

<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Novo Registo de Multas</h3>
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
} );
</script>

</head>
<body>

<?php echo form_open('multas/create', 'class="ink-form all-100 small-100 tiny-100"'); ?>
<form>
<div class="container">
<div class="row">
<?php
    $this->db->select_max('serial');
    $result = $this->db->get('artigos')->row_array();
    $a = 'AF' . $result['serial'];
    $serial = $result['serial'];
    //echo $a;
    //echo $serial;
?>
<div class="col-md-3">
    <label>ID</label>
    <div class="control"> 
    <input type="text" class="form-control" name="multa" value="<?php echo ++$a; ?>" readonly />
    <input type="text" class="form-control" name="serial" value="<?php echo ++$serial; ?>"  hidden />
    </div>
</div>
<div class="col-md-3">
<label>Nome *</label>
    <div class="control">
    <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" placeholder="Nome"/>
<!-- <select name="title" class="form-control">     
<option value="" selected="selected">----------------</option>
<?php //foreach ($contactos as $contactos_item): ?>
<option value="<?php //echo $contactos_item['title']; ?>"><?php //echo $contactos_item['title']; ?></option>
<?php //endforeach;?>
</select> -->
    <!--<div class="slab-100 small"><a href="<?php //echo base_url("index.php/contactos/create/"); ?>">Criar nova Empresa</a></div>  -->
    <div class="small"><?php echo form_error('title'); ?></div>   
    </div>
</div>

<div class="col-md-3">
    <label>Data Registo *</label>
    <div class="control">     
        <input type="text" class="form-control" id="datepicker" name="data" value="<?php echo set_value('data'); ?>" placeholder="Ano-Mês-Dia"/>
        <div class="small"><?php echo form_error('data'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>Data Multa</label>
    <div class="control">     
        <input type="text" class="form-control" id="datepicker1" name="data_fim" value="<?php echo set_value('data_fim'); ?>" placeholder="Ano-Mês-Dia"/>
        <div class="small"><?php echo form_error('data_fim'); ?></div>    
    </div>
</div>
</div>

<div class="row">
 <div class="col-md-3">
    <label>Auto Nº</label>
    <div class="control">     
        <input type="text" class="form-control" name="auto" value="<?php echo set_value('auto'); ?>" placeholder="Auto"/>
        <div class="small"><?php echo form_error('auto'); ?></div>    
    </div>
</div>   
<div class="col-md-3">
    <label>Matrícula</label>
    <div class="control">     
        <input type="text" class="form-control" name="matricula" value="<?php echo set_value('matricula'); ?>" placeholder="00-00-00" />
        <div class="small"><?php echo form_error('matricula'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Descrição</label>
    <div class="control">     
        <input type="text" class="form-control" name="descricao" value="<?php echo set_value('descricao'); ?>" placeholder="Descricao"/>
        <div class="small"><?php echo form_error('descricao'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Entidade</label>
    <div class="control">     
        <input type="text" class="form-control" name="entidade" value="<?php echo set_value('entidade'); ?>" placeholder="Entidade"/>
        <div class="small"><?php echo form_error('entidade'); ?></div>    
    </div>
</div>
</div>

<div class="row">
<div class="col-md-3">  
    <label>Valor Multa (€)</label>
    <div class="control">     
        <input type="text" class="form-control" name="valor" value="<?php echo set_value('valor'); ?>" placeholder="0.00" />
        <div class="small"><?php echo form_error('valor'); ?></div>    
    </div>
</div>   
<div class="col-md-3">
    <label>Tipo Multa</label>
    <div class="control">     
    <select class="custom-select d-block w-100" name="tipo_multa">
    <option selected value="<?php echo set_value('tipo_multa'); ?>"></option>
    <option value="Documentação">Documentação</option>
    <option value="Infracção">Infracção</option>
    <option value="Infracção">Laboral</option>  
    <option value="Infracção">ANSR</option>
    <option value="Outra">Outra</option>
    </select>  
    <div class="small"><?php echo form_error('tipo_multa'); ?></div>    
    </div>
</div>
<!--
<div class="col-md-3"> 
    <label>Data Prescrição</label>
    <div class="control">     
        <input type="text" class="form-control" id="datepicker2" name="data_prescricao" value="<?php //echo set_value('data_prescricao'); ?>" placeholder="Ano-Mês-Dia"/>
        <div class="small"><?php //echo form_error('data_prescricao'); ?></div>    
    </div>
</div>
-->
<div class="col-md-3"> 
    <label>Data Fecho</label>
    <div class="control">     
        <input type="text" class="form-control" id="datepicker3" name="data_fecho" value="<?php echo set_value('data_fecho'); ?>" placeholder="Ano-Mês-Dia"/>
        <div class="small"><?php echo form_error('data_fecho'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>Valor Cobrado (€)</label>
    <div class="control">     
<input type="text" id="valor_cobrado" onchange="submitBday()" onclick="submitBday()" class="form-control"  name="valor_cobrado" value="<?php echo set_value('valor_cobrado'); ?>" placeholder="0.00" />
        <div class="small"><?php echo form_error('valor_cobrado'); ?></div>    
    </div>
</div>
</div>

<div class="row">
<div class="col-md-3"> 
    <label>Custo Advogado (€)</label>
    <div class="control">     
        <input type="text" class="form-control" onchange="submitBday()" onclick="submitBday()" id="custo_adv" name="custo_adv" value="<?php echo set_value('custo_adv'); ?>" placeholder="0.00" />
        <div class="small"><?php echo form_error('custo_adv'); ?></div>    
    </div>
</div>

<div class="col-md-3"> 
    <label>Resultado</label>
    <div class="control">     
<input type="text" id="resultado_multa" class="form-control" name="resultado" value="" placeholder="0.00" readonly />
    <div class="small"><?php echo form_error('resultado'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>Local</label>
    <div class="control">     
        <input type="text" class="form-control" name="local" value="<?php echo set_value('local'); ?>" placeholder="Local" />
        <div class="small"><?php echo form_error('local'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>Estado</label>
    <div class="control">     
    <select class="custom-select d-block w-100" name="estado">
   <!-- <option value="<?php //echo set_value('estado'); ?>"></option>-->
    <option selected value="Em Curso">Em Curso</option>
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
        <textarea type="text" class="form-control" name="observacoes" value="<?php set_value('observacoes'); ?>" /></textarea>
        <div class="small"><?php echo form_error('observacoes'); ?></div>    
    </div>
</div>
<div class="col-md-6">
    <!-- Hidden Field-->
    <input type="text" name="categoria_artigo" value="1" hidden/>
    <input type="text" name="visivel_artigo" value="1" hidden/>
    <input type="text" name="utilizador_artigo" value="<?php echo $user['id']; ?>" hidden/>
    <input type="text" name="criado_artigo" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
    <input type="text" name="modificado_artigo" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
</div>
<!-- close row -->
</div>
<!-- close container -->
</div>
        
<div class="container">
<div class="row">
<div class="col-md-8">
    <a class="btn btn-primary" href="<?php echo base_url("/index.php/users/account/"); ?>" ><span class="fa fa-home"></span> Cancelar</a>
    <button class="btn btn-primary"><span class="fa fa-save"></span> Guardar</button>
</div>
<div class="col-md-4">
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