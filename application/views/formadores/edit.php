
<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Ficha de Formador</h3>
</div>
</div>
</div>
</div> 

<?php echo form_open('formadores/edit/'.$formadores_item['id']); ?>
<form>
<div class="container">
<div class="row">
<div class="col-md-3">
    <label>Nome Formador</label>
    <div class="control">
    <input type="text" class="form-control" name="title" value="<?php echo $formadores_item['title']; ?>" />
    <div class="small"><?php echo form_error('title'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>CAP Formador</label>
    <div class="control">
    <input type="text" class="form-control" name="cap_formadores" value="<?php echo $formadores_item['cap_formadores']; ?>" />
    <div class="small"><?php echo form_error('cap_formadores'); ?></div>    
    </div>
</div>
<div class="col-md-3"> 
    <label>E-mail</label>
    <div class="control">
    <input type="text" class="form-control" name="email_formadores" value="<?php echo $formadores_item['email_formadores']; ?>" />
    <div class="small"><?php echo form_error('email_formadores'); ?></div>    
    </div>
</div>
</div>


<div class="row">
<div class="col-md-6"> 
    <label>Observações</label>
    <div class="control">
    <textarea type="text" class="form-control" name="descricao_formadores" value="<?php echo $formadores_item['descricao_formadores']; ?>" /><?php echo $formadores_item['descricao_formadores']; ?></textarea>
    <div class="small"><?php echo form_error('descricao_formadores'); ?></div>    
    </div>
</div>
<div class="col-md-6">
</div>
    <!-- Hidden Field-->    
    <input type="text" name="categoria_formadores" value="<?php echo $formadores_item['categoria_formadores'] ?>" hidden/>
    <input type="text" name="visivel_formadores" value="<?php echo $formadores_item['visivel_formadores'] ?>" hidden/>
    <input type="text" name="utilizador_formadores" value="<?php echo $formadores_item['utilizador_formadores'] ?>" hidden/>
    <input type="text" name="criado_formadores" value="<?php echo $formadores_item['criado_formadores'] ?>" hidden/>
    <input type="text" name="modificado_formadores" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/> 
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

