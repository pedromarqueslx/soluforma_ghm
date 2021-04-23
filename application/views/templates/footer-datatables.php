<?php

?>

<script>
$(document).ready(function() {
    $('#index_formadores').DataTable( {
            dom: 'Blfrtip',
            buttons: [
        'excel', 'print'
    ],
            "language": {
        "sProcessing":   "A processar...",
                "sLengthMenu":   "_MENU_",
                "sZeroRecords":  "Não foram encontrados resultados",
                "sInfo":         "_START_ até _END_ de _TOTAL_ registos",
                "sInfoEmpty":    "0 até 0 de 0 registos",
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
        });
    });
</script>
