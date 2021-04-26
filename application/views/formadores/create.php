

<div class="container-fluid bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <h3 class="my-4 text-primary">Novo Formador</h3>
            </div>
        </div>
    </div>
</div>

<?php echo form_open('formadores/create'); ?>
<form>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <label>Nome Formador</label>
                <div class="control">
                    <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" placeholder="Nome Formador"/>
                    <div class="small"><?php echo form_error('title'); ?></div>
                </div>
            </div>
            <div class="col-md-3">
                <label>CAP Formador</label>
                <div class="control">
                    <input type="text" class="form-control" name="cap_formadores" value="<?php echo set_value('cap_formadores'); ?>" placeholder="CAP"/>
                    <div class="small"><?php echo form_error('cap_formadores'); ?></div>
                </div>
            </div>
            <div class="col-md-3">
                <label>E-mail</label>
                <div class="control">
                    <input type="text" class="form-control" name="email_formadores" value="<?php echo set_value('email_formadores'); ?>" placeholder="E-mail Formador"/>
                    <div class="small"><?php echo form_error('email_formadores'); ?></div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <label>Observações</label>
                <div class="control">
                    <textarea type="text" class="form-control" name="descricao_formadores" value="<?php set_value('descricao_formadores'); ?>" placeholder="Observações"/></textarea>
                    <div class="small"><?php echo form_error('descricao_formadores'); ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Hidden Field-->
                <input type="text" name="categoria_formadores" value="1" hidden/>
                <input type="text" name="visivel_formadores" value="1" hidden/>
                <input type="text" name="utilizador_formadores" value="<?php echo $user['id']; ?>" hidden/>
                <input type="text" name="criado_formadores" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
                <input type="text" name="modificado_formadores" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
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
