
<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Ficha de Conteúdo</h3>
</div>
</div>
</div>
</div> 

<?php echo form_open('conteudos/edit/'.$conteudos_item['id']); ?>
<form>
<div class="container">
<div class="row">
<!--    
<div class="col-md-3">
    <label>ID</label>
    <div class="control">
    <input type="text" class="form-control" name="id" value="<?php //echo $conteudos_item['id']; ?>" readonly />
    <div class="small"><?php //echo form_error('id'); ?></div>
    </div>    
</div>
-->
<div class="col-md-6"> 
    <label>Área de Formação</label>
    <div class="control">
    <input type="text" class="form-control" name="title" value="<?php echo $conteudos_item['title']; ?>" />
    <div class="small"><?php echo form_error('title'); ?></div>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-3"> 
    <label>Nome</label>
    <div class="control">
    <textarea type="text" class="form-control" name="nome_conteudos" value="<?php echo $conteudos_item['nome_conteudos']; ?>" rows="3" ><?php echo $conteudos_item['nome_conteudos']; ?></textarea>
    <div class="small"><?php echo form_error('nome_conteudos'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>Horas</label>
    <div class="control">
    <textarea type="text" class="form-control" name="horas_conteudos" value="<?php echo $conteudos_item['horas_conteudos']; ?>" rows="3" ><?php echo $conteudos_item['horas_conteudos']; ?></textarea>
    <div class="small"><?php echo form_error('horas_conteudos'); ?></div>    
    </div>
</div>

<div class="col-md-6"> 
    <label>Conteúdos Programáticos</label>
    <div class="control">
        <textarea type="text" class="form-control" name="conteudos_conteudos" value="<?php echo $conteudos_item['conteudos_conteudos']; ?>" rows="3" ><?php echo $conteudos_item['conteudos_conteudos']; ?></textarea>
        <div class="small"><?php echo form_error('conteudos_conteudos'); ?></div>    
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6"> 
    <label>Observações</label>
    <div class="control">
    <textarea type="text" class="form-control" name="descricao_conteudos" value="<?php echo $conteudos_item['descricao_conteudos']; ?>" /><?php echo $conteudos_item['descricao_conteudos']; ?></textarea>
    <div class="small"><?php echo form_error('descricao_conteudos'); ?></div>    
    </div>
</div>
<div class="col-md-6">
</div>
    <!-- Hidden Field-->    
    <input type="text" name="categoria_conteudos" value="<?php echo $conteudos_item['categoria_conteudos'] ?>" hidden/>
    <input type="text" name="visivel_conteudos" value="<?php echo $conteudos_item['visivel_conteudos'] ?>" hidden/>
    <input type="text" name="utilizador_conteudos" value="<?php echo $conteudos_item['utilizador_conteudos'] ?>" hidden/>
    <input type="text" name="criado_conteudos" value="<?php echo $conteudos_item['criado_conteudos'] ?>" hidden/>
    <input type="text" name="modificado_conteudos" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/> 
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

