<?php
$segment_1 = $this->uri->segment(1);
$segment = $this->uri->segment(2);
$segment_3 = $this->uri->segment(3);
//echo $segment_3;
?>

<div class="container-fluid bg-light">
    <div class="container">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-md-6">
                <h1>Registo de Empresas</h1>
            </div>
            <div class="col-12 col-md-6 text-right">
                <a class="btn btn-success mx-auto" href="<?php echo site_url(); ?>/<?php echo 'contactos'; ?>/create/<?php echo $segment_3; ?>" >Nova Empresa</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped" id="index_contactos">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th id="result_tr" style="display: none;">Morada</th>
                        <th id="result_tr" style="display: none;">Localidade</th>
                        <th id="result_tr" style="display: none;">CP</th>
                        <th id="result_tr" style="display: none;">Cidade</th>
                        <th id="result_tr" style="display: none;">NIF</th>
                        <th>Pessoa</th>
                        <th>Telefone</th>
                        <th id="result_tr" style="display: none;">Fax</th>
                        <th>Tlm.</th>
                        <th id="result_tr" style="display: none;">Tel. Alt.</th>
                        <th>E-mail</th>
                        <th id="result_tr" style="display: none;">Nº Pessoas</th>
                        <th id="result_tr" style="display: none;">Tipo Contrato</th>
                        <th id="result_tr" style="display: none;">Designação</th>
                        <th>Valor</th>
                        <th id="result_tr" style="display: none;">Inicio Contr.</th>
                        <th>Cliente</th>
                        <th>Funcionários</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($results as $data) { ?>
                        <tr>
                            <td><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->numero_cliente; ?></a></td>
                            <td><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->title; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->endereco_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->localidade_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->codigopostal_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->cidade_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->contribuinte_cliente; ?></a></td>
                            <td ><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->pessoa_cliente; ?></a></td>
                            <td><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->telefone_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->fax_cliente; ?></a></td>
                            <td><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->telemovel_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->telemovel_alternativo_cliente; ?></a></td>
                            <td><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->email_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->pessoas_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->contrato_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->designacao_cliente; ?></a></td>
                            <td><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->valor_cliente; ?></a></td>
                            <td id="result_tr" style="display: none;"><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->data_inicio_cliente; ?></a></td>
                            <td><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->cliente_cliente; ?></a></td>
                            <td><a href="<?php echo site_url('contactos/edit/'.$data->id); ?>"><?php echo $data->numero_funcionarios; ?></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- close row -->
    </div>

    <!-- close container -->
</div>
</main>
