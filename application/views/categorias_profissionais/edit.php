

<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Registo de Categoria Profissional</h3>
</div>
</div>
</div>
</div>



<?php echo form_open('categorias_profissionais/edit/'.$categorias_profissionais['id']); ?>
<form>
<div class="container">
<div class="row">
<div class="col-md-6">
    <label>Nome Categoria Profissional</label>
    <div class="control">
    <input type="text" class="form-control" name="title" value="<?php echo $categorias_profissionais['title']; ?>" />
    <div class="small"><?php echo form_error('title'); ?></div>    
    </div>
</div>
</div>


<div class="row">
<div class="col-md-6"> 
    <label>Observações</label>
    <div class="control">
    <textarea type="text" class="form-control" name="descricao_categorias_profissionais" value="<?php echo $categorias_profissionais['descricao_categorias_profissionais']; ?>" /><?php echo $categorias_profissionais['descricao_categorias_profissionais']; ?></textarea>
    <div class="small"><?php echo form_error('descricao_categorias_profissionais'); ?></div>    
    </div>
</div>
<div class="col-md-6">
</div>
    <!-- Hidden Field-->    
    <input type="text" name="categoria_categorias_profissionais" value="<?php echo $categorias_profissionais['categoria_categorias_profissionais'] ?>" hidden/>
    <input type="text" name="visivel_categorias_profissionais" value="<?php echo $categorias_profissionais['visivel_categorias_profissionais'] ?>" hidden/>
    <input type="text" name="utilizador_categorias_profissionais" value="<?php echo $categorias_profissionais['utilizador_categorias_profissionais'] ?>" hidden/>
    <input type="text" name="criado_categorias_profissionais" value="<?php echo $categorias_profissionais['criado_categorias_profissionais'] ?>" hidden/>
    <input type="text" name="modificado_categorias_profissionais" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/> 
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
</div>
</div>

</form>

</main>