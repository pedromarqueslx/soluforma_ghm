
<div class="container-fluid bg-light">
<div class="container">
<div class="row mb-4">
<div class="col-md-12">
<h3 class="my-4 text-primary">Registo de Utilizadores</h3>
</div>
</div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <script>
            $(document).ready(function() {
                        $('#index_stock_material').DataTable( {
                        dom: 'Blfrtip',
                        buttons: [
                            'excel', 'pdf', 'print'
                        ],
                        "language": {
                        "sProcessing":   "A processar...",
                        "sLengthMenu":   "Mostrar _MENU_ registos",
                        "sZeroRecords":  "Não foram encontrados resultados",
                        "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registos",
                        "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registos",
                        "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
                        "sInfoPostFix":  "",
                        "sSearch":       "Procurar:",
                        "sUrl":          "",
                        "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                        }
                    }
                } );
            } );
            </script>

            <div class="table-responsive">
                <table id="index_stock_material" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Perfil</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $results[] = 0;
                            foreach($results as $data) {
                        ?>
                        <tr>
                            <td><a href="<?php echo site_url('users/edit/'.$data->id); ?>"><?php echo $data->name; ?></a></td>
                            <td><a href="<?php echo site_url('users/edit/'.$data->id); ?>"><?php echo $data->user_profile; ?></a></td>
                            <td><a href="<?php echo site_url('users/edit/'.$data->id); ?>"><?php echo $data->email; ?></a></td>
                            <td><a href="<?php echo site_url('users/edit/'.$data->id); ?>"><?php echo $data->phone;?></a></td>
                            <td><a href="<?php echo site_url('users/edit/'.$data->id); ?>"><?php echo $data->login_date;?></a></td>
                        </tr>
                        <?php } ?>
                </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</main>
