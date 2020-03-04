
<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Criar Novo Utilizador</h3>
</div>
</div>
</div>
</div>

<?php echo form_open('users/create', 'class="ink-form all-100 small-100 tiny-100"') ; ?>
<form>
<div class="container">
<!-- Example row of columns -->
<div class="row">
<div class="col-md-4"> 
    <label>Nome</label>
    <div class="control">
    <input type="text" class="form-control" name="name" placeholder="Nome" value="<?php $user['name']; ?>">
    <div class="small"><?php echo form_error('Name'); ?></div> 
    </div>
</div>
<div class="col-md-4">
    <label>E-mail</label>
    <div class="control">
    <input type="email" class="form-control" name="email" placeholder="E-mail" data-error="Endereço de e-mail inválido" value="<?php $user['email']; ?>">
    <div class="small"><?php echo form_error('email'); ?></div> 
    </div>
</div>
<div class="col-md-4">
    <label>Telefone</label>
    <div class="control">
    <input type="text" class="form-control" name="phone" placeholder="Telefone" value="<?php $user['phone']; ?>">
    </div>
</div>
</div>

<div class="row">
<div class="col-md-4"> 
    <label>Password</label>
    <div class="control">
    <input type="password" class="form-control" name="password" placeholder="Password">
    <div class="small"><?php echo form_error('password'); ?></div> 
    </div>
</div>
<div class="col-md-4">
    <label>Confirmar Password</label>
    <div class="control">
    <input type="password" class="form-control" data-match=".inputPassword" data-match-error="Whoops, these don't match" name="conf_password" placeholder="Confirmar password" >
    <div class="small"><?php echo form_error('conf_password'); ?></div> 
    </div>
</div>
<div class="col-md-4">
    <label>Perfil de Utilizador</label>
    <div class="control"> 
        <select class="form-control" name="user_profile" class="form-control">
        <option selected value="<?php echo set_value('user_profile'); ?>">----------------</option>
        <option value="Administrator">Administrator</option>
        <option value="Editor">Editor</option>
        </select>
    </div>
    <div class="small"><?php echo form_error('user_profile'); ?></div> 
    <!-- Hidden Field--> 
    <input type="text" name="created" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/> 
    <input type="text" name="modified" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
    <input type="text" name="status" value="<?php echo 1; ?>" hidden/> 
    <input type="text" name="login_date" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
</div>
</div>
<!-- close container -->
</div>
            
<div class="container">
<div class="row">
<div class="col-md-8">
    <a class="btn btn-primary" href="<?php echo base_url("/index.php/users/account/"); ?>" class="ink-button grey"><span class="fa fa-home"></span> Cancelar</a>
    <button class="btn btn-primary"><span class="fa fa-save"></span>Guardar</button>
</div>
<div class="col-md-4">
</div>
<!-- close row -->
</div>
<!-- close container -->
</div>

</form>
</main>
