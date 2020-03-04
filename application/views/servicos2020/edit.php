<div class="container-fluid bg-light">
<div class="container">    
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Certificado Emitido</h3>
</div>
</div>
</div>
</div> 

<?php echo form_open('servicos2020/edit/'.$servicos_item['id']); ?>
<form>
<div class="container">
<div class="row">

<div class="col-md-4">
    <label>Área de Formação</label>
    <div class="control">
    <input type="text" class="form-control" name="area_servicos" value="<?php echo $servicos_item['area_servicos'] ?>" placeholder="Conteúdo Programático" readonly />
    </div>
</div>
<div class="col-md-4">   
    <label>Formandor</label>
    <div class="control">
    <input type="text" class="form-control" name="formadores_servicos" value="<?php echo $servicos_item['formadores_servicos'] ?>" placeholder="Formador" readonly />
    <div class="small"><?php echo form_error('formadores_servicos'); ?></div>    
    </div>     
</div>
<div class="col-md-4">   
    <label>Data da Formação</label>
    <div class="control">    
    <input type="text" class="form-control" id="datepicker" name="data_servicos" value="<?php echo $servicos_item['data_servicos'] ?>" placeholder="Ano-Mês-Dia" readonly />
    <div class="small"><?php echo form_error('data_servicos'); ?></div>    
    </div>
</div>
</div>

<div class="row">
<div class="col-md-4">
    <label>Nome</label>
    <div class="control">
    <textarea type="text" class="form-control" name="nome_servicos" value="<?php echo $servicos_item['nome_servicos'] ?>" placeholder="Nome" rows="3" readonly ><?php echo $servicos_item['nome_servicos'] ?></textarea>
    </div>     
</div>
<div class="col-md-4">
    <label>Horas</label>
    <div class="control">
    <textarea type="text" class="form-control" name="horas_servicos" value="<?php echo $servicos_item['horas_servicos'] ?>" placeholder="Horas" rows="3" readonly ><?php echo $servicos_item['horas_servicos'] ?></textarea>
    </div>     
</div>
<div class="col-md-4">                    
    <label>Conteúdos Programáticos</label>
    <div class="control">
    <textarea type="text" class="form-control" name="conteudos_servicos" value="<?php echo $servicos_item['conteudos_servicos'] ?>" placeholder="Conteúdos Programáticos" rows="3" readonly /><?php echo $servicos_item['conteudos_servicos']; ?></textarea>
    </div>     
</div>
</div>

<hr>

<div class="row">
<div class="col-md-12">   
    <label>Empresa</label>
    <h2><?php echo $servicos_item['title'] ?></h2>
    <input type="text" class="form-control" name="title" value="<?php echo $servicos_item['title']; ?>" hidden/>
    <input type="text" class="form-control" name="title" value="<?php echo $servicos_item['empresa_id_servicos']; ?>" hidden/>
</div>
</div>
<div class="row">    
<div class="col-md-3">
    <label>Nome</label>
    <div class="control">
    <input type="text" class="form-control" name="nome_funcionario_servicos" value="<?php echo $servicos_item['nome_funcionario_servicos'] ?>" placeholder="Nome" readonly />
    <input type="text" class="form-control" name="formandos_servicos" value="<?php echo $servicos_item['formandos_servicos'] ?>" placeholder="id" hidden />
    </div>
</div>
<div class="col-md-3">                    
    <label>Naturalidade</label>
    <div class="control">
    <input type="text" class="form-control" name="naturalidade_servicos" value="<?php echo $servicos_item['naturalidade_servicos'] ?>" placeholder="Naturalidade" readonly />
    </div>     
</div>
<div class="col-md-3">   
    <label>Data Nascimento</label>
    <div class="control">
    <input type="text" class="form-control" name="data_nascimento_servicos" value="<?php echo $servicos_item['data_nascimento_servicos'] ?>" placeholder="Data Nascimento" readonly />
    </div>
</div>
<div class="col-md-3">          
    <label>Nacionalidade</label>
    <div class="control">
    <input type="text" class="form-control" name="nacionalidade_servicos" value="<?php echo $servicos_item['nacionalidade_servicos'] ?>" placeholder="Nacionalidade" readonly />
    </div>     
</div>
</div>


<div class="row">
<div class="col-md-3">                    
    <label>Documento de Identificacão</label>
    <div class="control">
    <input type="text" class="form-control" name="doc_identificacao_servicos" value="<?php echo $servicos_item['doc_identificacao_servicos'] ?>" placeholder="Documento de Identificacão" readonly />
    </div>     
</div>
<div class="col-md-3">                    
    <label>Data Validade Identificação</label>
    <div class="control">
    <input type="text" class="form-control" name="validade_identificacao_servicos" value="<?php echo $servicos_item['validade_identificacao_servicos'] ?>" placeholder="Data Validade Identificação" readonly />
    </div>     
</div>
<div class="col-md-3">  
    <label>&nbsp;</label>
    <div class="control">
    <a class="btn btn-outline-primary" href="<?php echo base_url("/index.php/funcionarios/edit/". $servicos_item['formandos_servicos'] ); ?>" target="_blank">Ficha Funcionário</a>
    </div>     
</div>
</div>


<div class="row">
<!--
<div class="col-md-6"> 
    <label>Observações</label>
    <div class="control">
    <textarea type="text" class="form-control" name="anotacoes_servicos" value="<?php //echo $servicos_item['anotacoes_servicos']; ?>" /><?php echo $servicos_item['anotacoes_servicos']; ?></textarea>
    <div class="small"><?php //echo form_error('anotacoes_servicos'); ?></div>    
    </div>    
</div>
-->
<div class="col-md-4">
    <!-- Hidden Field-->    
    <input type="text" name="categoria_servicos" value="<?php echo $servicos_item['categoria_servicos'] ?>" hidden/>
    <input type="text" name="visivel_servicos" value="<?php echo $servicos_item['visivel_servicos'] ?>" hidden/>
    <input type="text" name="criado_servicos" value="<?php echo $servicos_item['criado_servicos'] ?>" hidden/>
    <input type="text" name="modificado_servicos" value="<?php echo date("Y-m-d H:i:s"); ?>" hidden/>
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
    <a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo $segment_1; ?>/delete/<?php echo $segment_3; ?>" onClick="return confirm('Quer mesmo apagar o registo?')">Apagar</a>
    <a class="btn btn-primary" href="<?php echo base_url("/index.php/servicos2020/pdf/". $servicos_item['id'] ); ?>" target="_blank">Emitir Certificado</a>
    <!--<button class="btn btn-primary">Guardar</button>-->
</div>
<div class="col-md-4">
</div>
</div>
</div>

</form>

</main>