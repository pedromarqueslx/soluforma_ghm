    <?php
        if (isset($read_set_value)) {
            echo $read_set_value;
        }
        if (isset($message_display)) {
            echo $message_display;
        }
    ?>

<div class="ink-grid quarter-vertical-gutters">

    <div class="all-100 small-100 tiny-100">
        
        <div class="column-group">

            <h1><a href="<?php echo site_url();?>/renda/">Relatório de Renda</a></h1>

        </div>

    </div>

</div>

<hr>

<div class="ink-grid">

    <div class="column-group gutters">

        <div class="example all-75 small-100 tiny-100">

            <div class="control-group column-group gutters">  

                <div class="control-group required all-100 small-100 tiny-100 "> 

                    <label>Seleccionar Matrícula e intervalo de datas</label>
                    <div class="control quarter-top-space"> 
                    <div class="ink-form all-100 small-100 tiny-100 ">

                    <?php  

                    echo form_open('renda/select_id_and_date_range');

                    $data = array(NULL => 'Seleccione Matrícula');
                    if(is_array($show_table)) {
                            foreach ($show_table as $value ){
                                $data[$value ->title] = $value ->title;
                            }
                        echo form_dropdown('id',$data); 
                          } else {
                        redirect( base_url() . 'index.php/renda');
                    }

                    $data = array(
                        'id' => 'datepicker',
                        //'type' => 'date',
                        'name' => 'date_from',
                        'placeholder' => 'ano-mês-dia'
                    );

                    echo form_input($data);

                    $data = array(
                        'id' => 'datepicker1',
                        //'type' => 'date',
                        'name' => 'date_to',
                        'placeholder' => 'ano-mês-dia'
                    );

                    echo form_input($data);
                    
                    if (isset($date_range_error_message)) {
                        echo '<div class="small">';
                        echo $date_range_error_message;
                        echo '</div>';
                    }

                    ?>

                    </div>
                    </div>

                </div>                

            </div>

           <script>
            $(document).ready(function() {
                        $('#total_renda').DataTable( {
                        dom: 'Brtip',
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

            <table id="total_renda" class="display">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Data</th>
                        <th>Custo</th>
                        <th>Km</th>
                    </tr>
                </thead>
                <tbody>

                    <?php //foreach ($servicos as $servicos_item): 
                        if (isset($result_display)) {
                            if ($result_display == 'Não foram encontrados Registos !') {
                                echo "<td>" . $result_display . "</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                            } else {
                    ?>        
                    <?php foreach ($result_display as $value) {?>
                    <tr>
                        <td><a href="<?php echo site_url('renda/edit/'.$value->id); ?>"><?php echo $value->title; ?></a></td>
                        <td><a href="<?php echo site_url('renda/edit/'.$value->id); ?>"><?php echo $value->data; ?></a></td>
                        <td><a href="<?php echo site_url('renda/edit/'.$value->id); ?>"><?php echo $value->custo; ?></a></td>
                        <td><a href="<?php echo site_url('renda/edit/'.$value->id); ?>"><?php echo $value->km; ?></a></td>
                    </tr>

                    <?php     
                                }
                            }
                        }
                    ?>

                </tbody>
            </table>

            <hr>

            <div class="all-100 small-100 tiny-100 small align-right">
                <a href="<?php echo base_url("/index.php/renda/total/"); ?>" class="ink-button grey"><span class="fa fa-home"></span> Cancelar</a>


                <?php 
                    echo '<button class="ink-button grey"><span class="fa fa-print"></span> Relatório</button>';
                    echo form_close(); 
                ?>
                
            </div>


            <nav class="ink-navigation small">
                <ul class="pagination blue">
                    <?php //echo $links ; ?>
                </ul>
            </nav>

        </div>

        <div class="all-25 small-100 tiny-100 vertical-space">

            <nav class="ink-navigation small">

                <ul class="menu vertical blue">

                    <?php
                    $segment = $this->uri->segment(2);
                    //echo $segment;
                    ?>
                    <li <?php if($segment == "create") { echo "class='heading active'"; } else {echo ""; } ?> ><a href="<?php echo site_url();?>/renda/create/"><span class="fa fa-cog"></span> Novo Registo</a></li>
                    <li <?php if($segment == "index") { echo "class='heading active'"; } else {echo ""; } ?> ><a href="<?php echo site_url();?>/renda/index/"><span class="fa fa-cog"></span> Registos de Renda</a></li>
                    <li <?php if($segment == "total") { echo "class='heading active'"; } else {echo ""; } ?> ><a href="<?php echo site_url();?>/renda/total/"><span class="fa fa-cog"></span> Relatórios de Renda</a></li>

                </ul>

            </nav>

                <?php //foreach ($intervencao as $intervencao_item): 

                if (isset($result_display)) {
                    if ($result_display == 'Não foram encontrados Registos !') {
                        echo $result_display;
                    } else {
                    $sum = 0;
                    foreach ($result_display as $value) {
                        $sum+= $value->custo;
                            }
                            echo '<div class="ink-alert block info" role="alert">';
                            echo '<button class="ink-dismiss">&times;</button>';
                            echo "<h4>" . "€" . $sum . "</h4>"; 
                            //echo "<p>" .  . "</p>"; 
                            echo "<p class='small'>Matrícula: " . $id . "</p>"; 
                            echo "<p class='small'>Datas: " . $date1 . " - " . $date2 . "</p>";
                            echo "</div>";
                        } 
                    }
                ?>             

        </div>

    </div>

</div>

<?php
/*
if (isset($show_table)) {
    echo "<div class=''>";
    if ($show_table == 'Database is empty !') {
        echo $show_table;
    } else {
        
        echo "<table  width='500px' border'5px' =>";
        foreach ($show_table as $value) {
            echo "<tr>" . "<td class='e_id'>" . $value->id . "</td>" . "<td>" . $value->title . "</td>" . "<td>" . $value->data . "</td>" . "<tr/>";
        }
        echo '</table>';
    }
    echo "</div>";
}
*/
?>