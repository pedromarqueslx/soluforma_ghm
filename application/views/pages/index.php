
<main role="main">
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1>GHM - Gestão de Histórico de Multas</h1>
      <hr>
    </div>
  </div>
</main>


<div class="container">
    <div class="row">

<?php if ($user['user_profile'] == 'Administrator') {
echo '<div class="col-md-6">';
echo '<div class="table-responsive">';
echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>Últimas Formações Realizadas</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($servicos as $servicos_item) {
echo '<tr>';
echo '<td>';
echo '<a href="';
echo site_url('servicos/edit/' . $servicos_item['id']);
echo '">';
echo $servicos_item['title'];
echo '</a></td>';
echo '<td>';
echo '<a href="';
echo site_url('servicos/edit/' . $servicos_item['id']);
echo '">';
echo $servicos_item['data_servicos'];
echo '</a></td>';
echo '</tr>';

}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
}
?>

<!-- close row -->
</div>

<?php
$segment_1 = $this->uri->segment(1);
$segment = $this->uri->segment(2);
$segment_3 = $this->uri->segment(3);
//echo $segment_3;
?>

<div class="row">
<div class="col-md-4">
    <a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo 'contactos'; ?>/create/<?php echo $segment_3; ?>" >Nova Empresa</a>
    <a class="btn btn-primary" href="<?php echo site_url(); ?>/<?php echo 'servicos'; ?>/create/<?php echo $segment_3; ?>" >Nova Formação</a>
</div>
<div class="col-md-8">
<!-- GRAFICO GRAFICO HISTÓRICO DE INTERVENÇÕES -->
<?php
$query = $this->db->query("SELECT * FROM servicos;");
$row = $query->row();
if (isset($row))
{
$year_for_graphic = '2017';
// Query for Janeiro
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='01' AND categoria_servicos='1') as janeiro ");
$q=$this->db->get('servicos');
$row=$q->row();
$janeiro=$row->janeiro;
//echo $janeiro;
// Query for Fevereiro
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='02' AND categoria_servicos='1') as fevereiro ");
$q=$this->db->get('servicos');
$row=$q->row();
$fevereiro=$row->fevereiro;
//echo $fevereiro;
?>
<?php
// Query for Março
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='03' AND categoria_servicos='1') as marco ");
$q=$this->db->get('servicos');
$row=$q->row();
$marco=$row->marco;
//echo $marco;
?>
<?php
// Query for Abril
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='04' AND categoria_servicos='1') as abril ");
$q=$this->db->get('servicos');
$row=$q->row();
$abril=$row->abril;
//echo $abril;
?>
<?php
// Query for maio
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='05' AND categoria_servicos='1') as maio ");
$q=$this->db->get('servicos');
$row=$q->row();
$maio=$row->maio;
//echo $maio;
?>
<?php
// Query for Junho
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='06' AND categoria_servicos='1') as junho ");
$q=$this->db->get('servicos');
$row=$q->row();
$junho=$row->junho;
//echo $junho;
?>
<?php
// Query for Junho
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='07' AND categoria_servicos='1') as julho ");
$q=$this->db->get('servicos');
$row=$q->row();
$julho=$row->julho;
//echo $julho;
?>
<?php
// Query for agosto
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='08' AND categoria_servicos='1') as agosto ");
$q=$this->db->get('servicos');
$row=$q->row();
$agosto=$row->agosto;
//echo $agosto;
?>
<?php
// Query for setembro
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='09' AND categoria_servicos='1') as setembro ");
$q=$this->db->get('servicos');
$row=$q->row();
$setembro=$row->setembro;
//echo $setembro;
?>
<?php
// Query for outubro
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='10' AND categoria_servicos='1') as outubro ");
$q=$this->db->get('servicos');
$row=$q->row();
$outubro=$row->outubro;
//echo $outubro;
?>
<?php
// Query for novembro
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='11' AND categoria_servicos='1') as novembro ");
$q=$this->db->get('servicos');
$row=$q->row();
$novembro=$row->novembro;
//echo $novembro;
?>
<?php
// Query for dezembro
$this->db->select("(SELECT COUNT(categoria_servicos) FROM servicos WHERE YEAR(data_servicos)='$year_for_graphic' AND MONTH(data_servicos)='12' AND categoria_servicos='1') as dezembro ");
$q=$this->db->get('servicos');
$row=$q->row();
$dezembro=$row->dezembro;
//echo $dezembro;
 ?>

<?php
}
/*else{
if ($user['id'] >= 7) {
    echo "De momento não há registo de Serviços registados"; }
else {
    echo '<a href="' . site_url() . '/servicos/create">Por favor adicione um novo registos de Serviços.</a><br>';
    echo '<a href="' . site_url() . '/servicos/create"><button class="ink-button grey small"><span class="fa fa-plus"></span> Novo Registo</button></a>';
}
}
*/
?>

<!-- remove comment to see graphic bar
<canvas id="home_servicos_2017"></canvas>
-->
<script>
var ctx = document.getElementById('home_servicos_2017').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',
    // The data for our dataset
    data: {
    labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
    datasets: [{
        label: "Intervenções Realizadas",
        //backgroundColor: 'rgb(255, 99, 132)',
        backgroundColor: 'rgb(12, 91, 170)',
        borderColor: 'rgb(7, 49, 91)',
        data: [<?php echo $janeiro; ?>, <?php echo $fevereiro; ?>, <?php echo $marco; ?>, <?php echo $abril; ?>, <?php echo $maio; ?>, <?php echo $junho; ?>,
        <?php echo $julho; ?>, <?php echo $agosto; ?>, <?php echo $setembro; ?>, <?php echo $outubro; ?>, <?php echo $novembro; ?>, <?php echo $dezembro; ?>,],
    }]
    },

    // Configuration options go here
    options: {
        scales: {
            yAxes: [{
              ticks: {
                max: 120,
                min: 0,
                stepSize: 20
                }
            }]
        }
    }
});
</script>
<!-- FIM DO GRAFICO HISTÓRICO DE INTERVENÇÕES -->
</div>

<!-- close row -->
</div>
<!-- close container -->
</div>


</main>

