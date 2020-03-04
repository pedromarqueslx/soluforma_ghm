<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
<div class="container">
<div class="row">
<div class="col"> 
<h1>Folha de Intervenção</h1>
</div>
</div>
</div>

<?php echo form_open('servicos/matricula/'.$servicos_item['id']); ?>
<form>
<div class="container">
<div class="row">
<div class="col-md-4">
    <label>Cliente</label>
    <h2><?php echo $servicos_item['title'] ?></h2>
    <input type="text" class="form-control" name="title" value="<?php echo $servicos_item['title']; ?>" hidden/>
</div>
<div class="col-md-4">
    <label>Matrícula</label>
    <div class="control">
    <input type="text" class="form-control" name="matricula_servicos" value="<?php echo $servicos_item['matricula_servicos'] ?>" placeholder="Matrícula"/>
    <div class="small"><?php echo form_error('matricula_servicos'); ?></div>    
    </div>     
</div>
<div class="col-md-4">
    <label>Data da Intervenção</label>
    <div class="control">    
    <input type="text" class="form-control" id="datepicker" name="data_servicos" value="<?php echo $servicos_item['data_servicos'] ?>" placeholder="Ano-Mês-Dia" />
    <div class="small"><?php echo form_error('data_servicos'); ?></div>    
    </div>
</div>                
</div>

<div class="row">
<div class="col-md-4">
    <label>Quilometros</label>
    <div class="control">
    <input type="text" class="form-control" name="km_servicos" value="<?php echo $servicos_item['km_servicos'] ?>" placeholder="Quilometros"/>
    </div>
</div>
<div class="col-md-4"> 
    <label>Marca</label>
    <div class="control">
    <!--<input type="text" class="form-control" name="marca_servicos" value="<?php //echo $servicos_item['marca_servicos'] ?>" placeholder="Marca"/>-->
    <select name="marca_servicos" class="form-control">
        <option selected value="<?php echo $servicos_item['marca_servicos']  ?>"><?php echo $servicos_item['marca_servicos'] ?></option>
        <option value="Abarth">Abarth</option>
        <option value="Alfa Romeo">Alfa Romeo</option>
        <option value="Aston Martin">Aston Martin</option>
        <option value="Audi">Audi</option>
        <option value="Bentley">Bentley</option>
        <option value="BMW">BMW</option>
        <option value="Chevrolet">Chevrolet</option>
        <option value="Chrysler">Chrysler</option>
        <option value="Citroen">Citroën</option>
        <option value="Dacia">Dacia</option>
        <option value="Daihatsu">Daihatsu</option>
        <option value="Dodge">Dodge</option>
        <option value="Ferrari">Ferrari</option>
        <option value="Fiat">Fiat</option>
        <option value="Ford">Ford</option>
        <option value="Honda">Honda</option>
        <option value="Hyundai">Hyundai</option>
        <option value="Isuzu">Isuzu</option>
        <option value="Iveco">Iveco</option>
        <option value="Jaguar">Jaguar</option>
        <option value="Jeep">Jeep</option>
        <option value="Kia">Kia</option>
        <option value="Lada">Lada</option>
        <option value="Lamborghini">Lamborghini</option>
        <option value="Lancia">Lancia</option>
        <option value="Land Rover">Land Rover</option>
        <option value="Lexus">Lexus</option>
        <option value="Lotus">Lotus</option>
        <option value="Maserati">Maserati</option>
        <option value="Mazda">Mazda</option>
        <option value="Mercedes">Mercedes-Benz</option>
        <option value="Mini">Mini</option>  
        <option value="Mitsubishi">Mitsubishi</option>
        <option value="Nissan">Nissan</option>
        <option value="Opel">Opel</option>                              
        <option value="Peugeot">Peugeot</option>                                
        <option value="Porsche">Porsche</option>                                    
        <option value="Renault">Renault</option>
        <option value="Saab">Saab</option>
        <option value="Seat">Seat</option>
        <option value="Skoda">Skoda</option>
        <option value="Smart">Smart</option>
        <option value="Subaru">Subaru</option>
        <option value="Suzuki">Suzuki</option>
        <option value="Toyota">Toyota</option>
        <option value="Volkswagen">Volkswagen</option>
        <option value="Volvo">Volvo</option>
        <option value="Westfield">Westfield</option>
    </select>      
    </div> 
</div>                               
<div class="col-md-4">
    <label>Modelo</label>
    <div class="control">    
    <input type="text" class="form-control" name="modelo_servicos" value="<?php echo $servicos_item['modelo_servicos'] ?>" placeholder="Modelo"/>
    </div>
</div>
</div>
                
<div class="row">
<div class="col-md-8">
    <label>Intervenções</label>
    <div class="control">
    <textarea type="text" class="form-control" name="observacoes_servicos" value="<?php echo $servicos_item['observacoes_servicos']; ?>" /><?php echo $servicos_item['observacoes_servicos']; ?></textarea>
    <div class="small"><?php echo form_error('observacoes_servicos'); ?></div>    
    </div>    
</div>
<div class="col-md-4">
    <label>Combustível</label>
    <div class="control">    
    <select name="combustivel_servicos" class="form-control">
        <option selected value="<?php echo $servicos_item['combustivel_servicos'] ?>"><?php echo $servicos_item['combustivel_servicos'] ?></option>
        <option value="Gasolina">Gasolina</option>
        <option value="Gasóleo">Gasóleo</option>
        <option value="Hibrido">Híbrido</option>
        <option value="Electrico">Electríco</option>
        <option value="Electrico">GPL</option>
        <option value="Electrico">Outros</option>
    </select>     
    </div>    
</div>    
</div>

<div class="row">
<div class="col-md-8">
    <label>Anotações</label>
    <div class="control">
    <textarea type="text" class="form-control" name="anotacoes_servicos" value="<?php echo $servicos_item['anotacoes_servicos']; ?>" /><?php echo $servicos_item['anotacoes_servicos']; ?></textarea>
    <div class="small"><?php echo form_error('anotacoes_servicos'); ?></div>    
    </div>    
</div>
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
    <a class="btn btn-primary" href="<?php echo base_url("/index.php/servicos/pdf/". $segment_3 ); ?>" target="_blank">Folha de Intervenção</a>

    <button class="btn btn-primary">Guardar</button>
    

<script>
function myFunction() {
    window.print();
}
</script>

</div>
<div class="col-md-4">
</div>
</div>
</div>

</form>

</main>

<!-- close header class="container-fluid" -->
</div>
<!-- close header class="row" -->
</div>