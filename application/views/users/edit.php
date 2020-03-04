

<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Dados de Utilizador</h3>
</div>
</div>
</div>
</div>


<?php echo form_open('users/edit/'.$users['id']); ?>
<form>
<div class="container">
<div class="row">
<div class="col-md-4">
    <label>Nome</label>
    <div class="control">
    <input type="text" class="form-control" name="name" value="<?php echo $users['name']; ?>" />
    <div class="small"><?php echo form_error('Name'); ?></div>    
    </div>
</div>
<div class="col-md-4">
    <label>E-mail</label>
    <div class="control">
    <input type="text" class="form-control" name="email" value="<?php echo $users['email']; ?>"  />
    <div class="small"><?php echo form_error('Email'); ?></div>   
    </div>
</div>
<div class="col-md-4">
    <label>Telefone</label>
    <div class="control">
    <input type="text" class="form-control" name="phone" value="<?php echo $users['phone']; ?>"  />
    </div>
</div>
</div>

<div class="row">
<div class="col-md-4">
    <label>Nova Password</label>
    <div class="control">
    <input type="password" class="form-control" name="password" placeholder="Password" >
    <div class="small"><?php echo form_error('password'); ?></div> 
    </div>
</div>
<div class="col-md-4">
    <label>Confirmar Nova Password</label>
    <div class="control">
    <input type="password" class="form-control" data-match=".inputPassword" data-match-error="Whoops, these don't match" name="conf_password" placeholder="Confirmar password" >
    <div class="small"><?php echo form_error('conf_password'); ?></div> 
    </div>

</div>
<div class="col-md-4">
    <label>Perfil de Utilizador</label>
    <div class="control"> 
        <select class="form-control" name="user_profile" class="form-control">
        <option selected value="<?php echo set_value('user_profile'); ?>"><?php echo $users['user_profile'] ?></option>
        <option value="Administrator">Administrator</option>
        <option value="Editor">Editor</option>
        </select>
    </div>
    <div class="small"><?php echo form_error('user_profile'); ?></div>    
    <!-- Hidden Field-->  
    <input type="text" name="created" value="<?php echo $users['created']; ?>" hidden/> 
    <input type="text" name="modified" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
    <input type="text" name="status" value="<?php echo $users['status']; ?>" hidden/> 
    <input type="text" name="login_date" value="<?php echo $users['login_date']; ?>" hidden/>     
</div>
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
    <a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo $segment_1; ?>/create/ ">Criar Novo Utilizador</a>    
    <a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo $segment_1; ?>/delete/<?php echo $segment_3; ?>" onClick="return confirm('Quer mesmo apagar o registo?')" > Apagar</a>
    <button class="btn btn-primary">Guardar</button>  
</div>
<div class="col-md-4">
</div>
</div>
</div>

</form>
</main>
