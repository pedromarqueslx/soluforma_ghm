

<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Registo de Tipo de Infracção</h3>
</div>
</div>
</div>
</div> 

<?php echo form_open('infracoes/create', 'class="ink-form all-100 small-100 tiny-100"'); ?>
<form>
<div class="container">
<div class="row">
<!--
<div class="col-md-3">
    <label>ID</label>
    <div class="control">
    <input type="text" class="form-control" name="id" value="<?php //echo set_value('id'); ?>" placeholder="ID" readonly />
    <div class="small"><?php //echo form_error('id'); ?></div>
    </div>
</div>
-->
<div class="col-md-6">
    <label>Título da Infracção</label>
    <div class="control">
    <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" placeholder="Título da Infracção"/>
    <div class="small"><?php echo form_error('title'); ?></div>    
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <label>Regulamento</label>
    <div class="control">
        <textarea type="text" class="form-control" name="nome_infracoes" value="<?php echo set_value('nome_infracoes'); ?>" placeholder="Regulamento da Infracção" rows="3" ></textarea>
        <div class="small"><?php echo form_error('nome_infracoes'); ?></div>    
    </div>
</div>
<!--
<div class="col-md-3">
    <label>Horas</label>
    <div class="control">
        <textarea type="text" class="form-control" name="horas_infracoes" value="<?php //echo set_value('horas_infracoes'); ?>" placeholder="Horas" rows="3" ></textarea>
        <div class="small"><?php //echo form_error('horas_infracoes'); ?></div>
    </div>
</div>
-->
<div class="col-md-6"> 
    <label>Descrição</label>
    <div class="control">
        <textarea type="text" class="form-control" name="infracoes_infracoes" value="<?php set_value('infracoes_infracoes'); ?>" placeholder="Descrição da Infracção" rows="3" ></textarea>
        <div class="small"><?php echo form_error('infracoes_infracoes'); ?></div>    
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6"> 
    <label>Observações</label>
    <div class="control">
        <textarea type="text" class="form-control" name="descricao_infracoes" value="<?php set_value('descricao_infracoes'); ?>" placeholder="Observações"/></textarea>
        <div class="small"><?php echo form_error('descricao_infracoes'); ?></div>    
    </div>
</div>
<div class="col-md-6">
    <!-- Hidden Field-->  
    <input type="text" name="categoria_infracoes" value="1" hidden/>
    <input type="text" name="visivel_infracoes" value="1" hidden/>
    <input type="text" name="utilizador_infracoes" value="<?php echo $user['id']; ?>" hidden/>
    <input type="text" name="criado_infracoes" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
    <input type="text" name="modificado_infracoes" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
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
