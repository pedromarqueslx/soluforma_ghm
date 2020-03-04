
<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Ficha de Conteúdo</h3>
</div>
</div>
</div>
</div> 

<?php echo form_open('infracoes/edit/'.$infracoes_item['id']); ?>
<form>
<div class="container">
<div class="row">
<!--    
<div class="col-md-3">
    <label>ID</label>
    <div class="control">
    <input type="text" class="form-control" name="id" value="<?php //echo $infracoes_item['id']; ?>" readonly />
    <div class="small"><?php //echo form_error('id'); ?></div>
    </div>    
</div>
-->
<div class="col-md-6"> 
    <label>Título da Infracção</label>
    <div class="control">
    <input type="text" class="form-control" name="title" value="<?php echo $infracoes_item['title']; ?>" />
    <div class="small"><?php echo form_error('title'); ?></div>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">
    <label>Regulamento</label>
    <div class="control">
    <textarea type="text" class="form-control" name="nome_infracoes" value="<?php echo $infracoes_item['nome_infracoes']; ?>" rows="3" ><?php echo $infracoes_item['nome_infracoes']; ?></textarea>
    <div class="small"><?php echo form_error('nome_infracoes'); ?></div>    
    </div>
</div>
<!--
<div class="col-md-3"> 
    <label>Horas</label>
    <div class="control">
    <textarea type="text" class="form-control" name="horas_infracoes" value="<?php //echo $infracoes_item['horas_infracoes']; ?>" rows="3" ><?php //echo $infracoes_item['horas_infracoes']; ?></textarea>
    <div class="small"><?php //echo form_error('horas_infracoes'); ?></div>
    </div>
</div>
-->
<div class="col-md-6"> 
    <label>Descrição</label>
    <div class="control">
        <textarea type="text" class="form-control" name="infracoes_infracoes" value="<?php echo $infracoes_item['infracoes_infracoes']; ?>" rows="3" ><?php echo $infracoes_item['infracoes_infracoes']; ?></textarea>
        <div class="small"><?php echo form_error('infracoes_infracoes'); ?></div>    
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6"> 
    <label>Observações</label>
    <div class="control">
    <textarea type="text" class="form-control" name="descricao_infracoes" value="<?php echo $infracoes_item['descricao_infracoes']; ?>" /><?php echo $infracoes_item['descricao_infracoes']; ?></textarea>
    <div class="small"><?php echo form_error('descricao_infracoes'); ?></div>    
    </div>
</div>
<div class="col-md-6">
</div>
    <!-- Hidden Field-->    
    <input type="text" name="categoria_infracoes" value="<?php echo $infracoes_item['categoria_infracoes'] ?>" hidden/>
    <input type="text" name="visivel_infracoes" value="<?php echo $infracoes_item['visivel_infracoes'] ?>" hidden/>
    <input type="text" name="utilizador_infracoes" value="<?php echo $infracoes_item['utilizador_infracoes'] ?>" hidden/>
    <input type="text" name="criado_infracoes" value="<?php echo $infracoes_item['criado_infracoes'] ?>" hidden/>
    <input type="text" name="modificado_infracoes" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/> 
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
    <button class="btn btn-primary" type="submit" class="btn btn-primary">Guardar</button>
</div>
<div class="col-md-4">

</div>
</div>
</div>

</form>

</main>

