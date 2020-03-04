

<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Nova Empresa</h3>
</div>
</div>
</div>
</div> 

<?php echo form_open('contactos/create', 'class="ink-form all-100 small-100 tiny-100"'); ?>
<form>
<div class="container">
<div class="row">

<?php
$this->db->select_max('numero_cliente');
$result = $this->db->get('contactos')->row_array();
$numero_cliente = ++$result['numero_cliente'];
//echo $a;
?>   

<div class="col-md-3">
    <label>ID</label>
    <div class="control"> 
    <!-- <p class=""><?php //echo $a; ?></p> -->
    <input type="text" class="form-control" name="numero_cliente" value="<?php echo $numero_cliente; ?>" readonly />
    </div>    
</div>    
<div class="col-md-3">                
    <label>Empresa</label>
    <div class="control">
    <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" placeholder="Nome Empresa"/>
    <div class="small"><?php echo form_error('title'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>Morada</label>
    <div class="control">
    <input type="text" class="form-control" name="endereco_cliente" value="<?php echo set_value('endereco_cliente'); ?>" placeholder="Morada"/>
    <div class="small"><?php echo form_error('endereco_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>Localidade</label>
    <div class="control">
    <input type="text" class="form-control" name="localidade_cliente" value="<?php echo set_value('localidade_cliente'); ?>" placeholder="Localidade"/>
    <div class="small"><?php echo form_error('localidade_cliente'); ?></div>    
    </div>
</div>

</div>

<div class="row">
<div class="col-md-3">
    <label>Código Postal</label>
    <div class="control">
    <input type="text" class="form-control" name="codigopostal_cliente" value="<?php echo set_value('codigopostal_cliente'); ?>" placeholder="Código Postal"/>
    <div class="small"><?php echo form_error('codigopostal_cliente'); ?></div>    
    </div>
</div>    
<div class="col-md-3"> 
    <label>Cidade</label>
    <div class="control">
    <input type="text" class="form-control" name="cidade_cliente" value="<?php echo set_value('cidade_cliente'); ?>" placeholder="Local"/>
    <div class="small"><?php echo form_error('cidade_cliente'); ?></div>    
    </div>
</div>    
<div class="col-md-3">
    <label>NIF</label>
    <div class="control">
    <input type="text" class="form-control" name="contribuinte_cliente" value="<?php echo set_value('contribuinte_cliente'); ?>" placeholder="Contribuinte Cliente"/>
    <div class="small"><?php echo form_error('contribuinte_cliente'); ?></div>    
    </div>
</div> 
<div class="col-md-3">
    <label>Pessoa</label>
    <div class="control">
    <input type="text" class="form-control" name="pessoa_cliente" value="<?php echo set_value('pessoa_cliente'); ?>" placeholder="Pessoa" />
    <div class="small"><?php echo form_error('pessoa_cliente'); ?></div>    
    </div>
</div>    

</div>    

<div class="row">
<div class="col-md-3"> 
    <label>Telefone</label>
    <div class="control">
        <input type="text" class="form-control" name="telefone_cliente" value="<?php echo set_value('telefone_cliente'); ?>" placeholder="Telefone Cliente"/>
        <div class="small"><?php echo form_error('telefone_cliente'); ?></div>    
    </div>
</div>    
<div class="col-md-3">
    <label>Fax</label>
    <div class="control">
        <input type="text" class="form-control" name="fax_cliente" value="<?php echo set_value('fax_cliente'); ?>" placeholder="Fax Cliente"/>
        <div class="small"><?php echo form_error('fax_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Telemóvel</label>
    <div class="control">
        <input type="text" class="form-control" name="telemovel_cliente" value="<?php echo set_value('telemovel_cliente'); ?>" placeholder="Telemóvel Cliente"/>
        <div class="small"><?php echo form_error('telemovel_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Telemóvel Alternativo</label>
    <div class="control">
        <input type="text" class="form-control" name="telemovel_alternativo_cliente" value="<?php echo set_value('telemovel_alternativo_cliente'); ?>" placeholder="Telemóvel Cliente"/>
        <div class="small"><?php echo form_error('telemovel_alternativo_cliente'); ?></div>    
    </div>
</div>    
</div>    

<div class="row">
<div class="col-md-3">
    <label>E-mail</label>
    <div class="control">
        <input type="text" class="form-control" name="email_cliente" value="<?php echo set_value('email_cliente'); ?>" placeholder="E-mail Cliente"/>
        <div class="small"><?php echo form_error('email_cliente'); ?></div>    
    </div>
</div>



<?php
$query = $this->db->query('SELECT * FROM funcionarios where n_cliente = '.$numero_cliente.'');
$count_rows_by_id = $query->num_rows();
?>

<div class="col-md-3">
    <label>Nº Pessoas</label>
    <div class="control">
        <input type="text" class="form-control" name="pessoas_cliente" value="<?php echo $count_rows_by_id; ?>" placeholder="Nº Pessoas" readonly />
        <div class="small"><?php echo form_error('pessoas_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Tipo Contrato</label>
    <div class="control">
        <input type="text" class="form-control" name="contrato_cliente" value="<?php echo set_value('contrato_cliente'); ?>" placeholder="Contrato"/>
        <div class="small"><?php echo form_error('contrato_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Designação</label>
    <div class="control">
        <input type="text" class="form-control" name="designacao_cliente" value="<?php echo set_value('designacao_cliente'); ?>" placeholder="Designação"/>
        <div class="small"><?php echo form_error('designacao_cliente'); ?></div>    
    </div>
</div>
</div>    

<div class="row">
    <div class="col-md-3">
    <label>Valor</label>
    <div class="control">
        <input type="text" class="form-control" name="valor_cliente" value="<?php echo set_value('valor_cliente'); ?>" placeholder="Valor"/>
        <div class="small"><?php echo form_error('valor_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Data Inicio Contrato</label>
    <div class="control">
        <input type="text" class="form-control" id="datepicker" name="data_inicio_cliente" value="<?php echo set_value('data_inicio_cliente'); ?>" placeholder="Ano-Mês-Dia" />
        <div class="small"><?php echo form_error('data_inicio_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Cliente</label>
    <div class="control">
<!--<input type="text" class="form-control" name="cliente_cliente" value="<?php //echo set_value('cliente_cliente'); ?>" placeholder="Cliente" />-->
    <select class="custom-select" name="cliente_cliente">
    <option selected value="<?php echo set_value('cliente_cliente'); ?>"></option>
    <option value="Sim">Sim</option>
    <option value="Nao">Nao</option>
    </select>    
    </div>
</div>
</div>



<div class="row">
<div class="col-md-6"> 
    <label>Observações</label>
    <div class="control">
        <textarea type="text" class="form-control" name="descricao_cliente" value="<?php set_value('descricao_cliente'); ?>" placeholder="Observações"/></textarea>
        <div class="small"><?php echo form_error('descricao_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-6">
    <!-- Hidden Field-->  
    <input type="text" name="categoria_cliente" value="1" hidden/>
    <input type="text" name="visivel_cliente" value="1" hidden/>
    <input type="text" name="utilizador_cliente" value="<?php echo $user['id']; ?>" hidden/>
    <input type="text" name="criado_cliente" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
    <input type="text" name="modificado_cliente" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
</div>
<!-- close row -->
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
<!-- close row -->
</div>
<!-- close container -->
</div>

</form>
</main>
