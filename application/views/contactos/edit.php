
<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Ficha de Empresa</h3>
</div>
</div>
</div>
</div> 

<?php echo form_open('contactos/edit/'.$contactos_item['id']); ?>
<form>
<div class="container">
<div class="row">
<div class="col-md-3">
    <label>ID</label>
    <!-- <p class="half-vertical-space"><?php //echo $contactos_item['numero_cliente'] ?></p> -->
    <input type="text" class="form-control" name="numero_cliente" value="<?php echo $contactos_item['numero_cliente']; ?>" readonly />
</div>    
<div class="col-md-3">
    <label>Empresa</label>
    <!-- <p class="half-vertical-space"><?php //echo $contactos_item['title'] ?></p> -->
    <input type="text" class="form-control" name="title" value="<?php echo $contactos_item['title']; ?>" readonly />
</div>
<div class="col-md-3"> 
    <label>Morada</label>
    <div class="control">
    <input type="text" class="form-control" name="endereco_cliente" value="<?php echo $contactos_item['endereco_cliente']; ?>" />
    <div class="small"><?php echo form_error('endereco_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>Localidade</label>
    <div class="control">
    <input type="text" class="form-control" name="localidade_cliente" value="<?php echo $contactos_item['localidade_cliente']; ?>" />
    <div class="small"><?php echo form_error('localidade_cliente'); ?></div>    
    </div>
</div>

</div>

<div class="row">
<div class="col-md-3">
    <label>Código Postal</label>
    <div class="control">
    <input type="text" class="form-control" name="codigopostal_cliente" value="<?php echo $contactos_item['codigopostal_cliente']; ?>" />
    <div class="small"><?php echo form_error('codigopostal_cliente'); ?></div>    
    </div>    
</div>   
<div class="col-md-3"> 
    <label>Cidade</label>
    <div class="control">
    <input type="text" class="form-control" name="cidade_cliente" value="<?php echo $contactos_item['cidade_cliente']; ?>" />
    <div class="small"><?php echo form_error('cidade_cliente'); ?></div>    
    </div>
</div>    
<div class="col-md-3">
    <label>NIF</label>
    <div class="control">
    <input type="text" class="form-control" name="contribuinte_cliente" value="<?php echo $contactos_item['contribuinte_cliente']; ?>"  />
    <div class="small"><?php echo form_error('contribuinte_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Pessoa</label>
    <div class="control">
    <input type="text" class="form-control" name="pessoa_cliente" value="<?php echo $contactos_item['pessoa_cliente']; ?>" />
    <div class="small"><?php echo form_error('pessoa_cliente'); ?></div>    
    </div> 
</div>  

</div>

<div class="row">
 <div class="col-md-3">
    <label>Telefone</label>
    <div class="control">
    <input type="text" class="form-control" name="telefone_cliente" value="<?php echo $contactos_item['telefone_cliente']; ?>" />
    <div class="small"><?php echo form_error('telefone_cliente'); ?></div>    
    </div> 
</div>   
<div class="col-md-3">
    <label>Fax</label>
    <div class="control">
    <input type="text" class="form-control" name="fax_cliente" value="<?php echo $contactos_item['fax_cliente']; ?>" />
    <div class="small"><?php echo form_error('fax_cliente'); ?></div>    
    </div>    
</div>
<div class="col-md-3">
    <label>Telemóvel</label>
    <div class="control">
    <input type="text" class="form-control" name="telemovel_cliente" value="<?php echo $contactos_item['telemovel_cliente']; ?>" />
    <div class="small"><?php echo form_error('telemovel_cliente'); ?></div>    
    </div>    
</div>
<div class="col-md-3">
    <label>Telemóvel Alternativo</label>
    <div class="control">
    <input type="text" class="form-control" name="telemovel_alternativo_cliente" value="<?php echo $contactos_item['telemovel_alternativo_cliente']; ?>" />
    <div class="small"><?php echo form_error('telemovel_alternativo_cliente'); ?></div>    
    </div>    
</div>    

</div>

<div class="row">
 <div class="col-md-3">
    <label>E-mail</label>
    <div class="control">
    <input type="text" class="form-control" name="email_cliente" value="<?php echo $contactos_item['email_cliente']; ?>" />
    <div class="small"><?php echo form_error('email_cliente'); ?></div>    
    </div>
</div>

<?php
// query to count num rows
$numero_cliente = $contactos_item['numero_cliente'];
$query = $this->db->query('SELECT * FROM funcionarios where n_cliente = '.$numero_cliente.'');
$count_rows_by_id = $query->num_rows();
?>

<div class="col-md-3">
    <label>Nº Pessoas</label>
    <div class="control">
    <input type="text" class="form-control" name="pessoas_cliente" value="<?php echo $count_rows_by_id; ?>" readonly />
    <div class="small"><?php echo form_error('pessoas_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Tipo Contrato</label>
    <div class="control">
    <input type="text" class="form-control" name="contrato_cliente" value="<?php echo $contactos_item['contrato_cliente']; ?>" />
    <div class="small"><?php echo form_error('contrato_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Designação</label>
    <div class="control">
    <input type="text" class="form-control" name="designacao_cliente" value="<?php echo $contactos_item['designacao_cliente']; ?>" />
    <div class="small"><?php echo form_error('designacao_cliente'); ?></div>    
    </div>
</div>

</div>

<div class="row">
 <div class="col-md-3">
    <label>Valor</label>
    <div class="control">
    <input type="text" class="form-control" name="valor_cliente" value="<?php echo $contactos_item['valor_cliente']; ?>" />
    <div class="small"><?php echo form_error('valor_cliente'); ?></div>    
    </div>
</div>   
<div class="col-md-3">
    <label>Data Inicio Contrato</label>
    <div class="control">
    <input type="text" class="form-control" id="datepicker" name="data_inicio_cliente" value="<?php echo $contactos_item['data_inicio_cliente']; ?>" placeholder="Ano-Mês-Dia" />
    <div class="small"><?php echo form_error('data_inicio_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-3">
    <label>Cliente</label>
    <div class="control">
<!--<input type="text" class="form-control" name="cliente_cliente" value="<?php //echo $contactos_item['cliente_cliente']; ?>" placeholder="Cliente" />-->
    <select class="custom-select" name="cliente_cliente">
        <option selected value="<?php echo $contactos_item['cliente_cliente']; ?>"><?php echo $contactos_item['cliente_cliente']; ?></option>
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
    </select>   
    </div>
</div>
</div>


<div class="row">
<div class="col-md-6"> 
    <label>Observações</label>
    <div class="control">
    <textarea type="text" class="form-control" name="descricao_cliente" value="<?php echo $contactos_item['descricao_cliente']; ?>" /><?php echo $contactos_item['descricao_cliente']; ?></textarea>
    <div class="small"><?php echo form_error('descricao_cliente'); ?></div>    
    </div>
</div>
<div class="col-md-6">
</div>
    <!-- Hidden Field-->    
    <input type="text" name="categoria_cliente" value="<?php echo $contactos_item['categoria_cliente'] ?>" hidden/>
    <input type="text" name="visivel_cliente" value="<?php echo $contactos_item['visivel_cliente'] ?>" hidden/>
    <input type="text" name="utilizador_cliente" value="<?php echo $contactos_item['utilizador_cliente'] ?>" hidden/>
    <input type="text" name="criado_cliente" value="<?php echo $contactos_item['criado_cliente'] ?>" hidden/>
    <input type="text" name="modificado_cliente" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/> 
</div>
<!-- close container -->
</div>

<div class="container">
<div class="row">
<div class="col-md-8">
    <?php
    $segment_1 = $this->uri->segment(1);
    $segment = $this->uri->segment(2);
    $segment_3 = $this->uri->segment(3);
    //echo $segment_3;
    ?>
    <a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo $segment_1; ?>/delete/<?php echo $segment_3; ?>" onClick="return confirm('Quer mesmo apagar o registo?')" >Apagar</a>
    <a class="btn btn-primary" href="<?php echo base_url("/index.php/contactos/pdf/".$segment_3); ?>" target="_blank" >PDF</a>
    <button class="btn btn-primary" type="submit" class="btn btn-primary">Guardar</button>
</div>
<div class="col-md-4">

</div>
</div>
</div>

</form>

</main>

