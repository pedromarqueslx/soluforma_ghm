
<div class="container-fluid bg-light">
    <div class="row mt-3">
        <div class="col">
        </div>
    </div>
</div>

</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<!-- OFFLINE -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery/jquery-ui.css">
<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-ui.js"></script>
<!--
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.flash.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.js"></script>
-->
<script src="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/DataTables/dataTables.buttons.js"></script>
<script src="<?php echo base_url(); ?>assets/DataTables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/DataTables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/DataTables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/DataTables/buttons.html5.js"></script>
<script src="<?php echo base_url(); ?>assets/DataTables/buttons.print.js"></script>

<!-- LOAD http://momentjs.com/ -->
<script src="<?php echo base_url(); ?>assets/js/moment.js"></script>

<script>
    $( function() {
            $("#datepicker").datepicker(
                {
                    dateFormat: 'yy-mm-dd',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                }
            );
        }
    );
    $( function() {
            $("#datepicker1").datepicker(
                {
                    dateFormat: 'yy-mm-dd',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                }
            );
        }
    );
    $( function() {
            $("#datepicker2").datepicker(
                {
                    dateFormat: 'yy-mm-dd',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                }
            );
        }
    );
    $( function() {
            $("#datepicker3").datepicker(
                {
                    dateFormat: 'yy-mm-dd',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                }
            );
        }
    );
    $( function() {
            $("#datepicker4").datepicker(
                {
                    dateFormat: 'yy-mm-dd',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                }
            );
        }
    );
    $( function() {
            $("#datepicker5").datepicker(
                {
                    dateFormat: 'yy-mm-dd',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                }
            );
        }
    );
    $( function() {
            $("#datepicker6").datepicker(
                {
                    dateFormat: 'yy-mm-dd',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                }
            );
        }
    );
    $( function() {
            $("#datepicker7").datepicker(
                {
                    dateFormat: 'yy-mm-dd',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                }
            );
        }
    );
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable( {
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

<script>
    $(document).ready(function() {
        $('#dataTable2020').DataTable( {
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

<script>
    $(document).ready(function() {
        $('#dataTable2019').DataTable( {
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

<!-- Used in Funcionarios -->
<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#table_id tfoot th').each( function () {
            var title = $(this).text();
            //$(this).html( '<input type="text" placeholder=" '+title+'" />' );
            $(this).html( '<input type="text" placeholder="*"/>' );
        } );

        // DataTable
        var table = $('#table_id').DataTable( {

                dom: 'Blfrtip',
                buttons: ['excel', 'print'],
                order:[ 2, "asc" ],

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
            }
        );

        // Apply the search
        table.columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    } );
</script>

<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#index_servicos tfoot th').each( function () {
            var title = $(this).text();
            //$(this).html( '<input type="text" placeholder=" '+title+'" />' );
            $(this).html( '<input type="text" placeholder="*"/>' );
        } );

        // DataTable
        var table = $('#index_servicos').DataTable( {

                dom: 'Blfrtip',
                buttons: ['excel', 'print'],
                order:[ 0, "desc" ],

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
            }
        );

        // Apply the search
        table.columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    } );
</script>

<script>
    $(document).ready(function() {

        // Setup - add a text input to each footer cell
        $('#index_formacoes tfoot th').each( function () {
            var title = $(this).text();
            //$(this).html( '<input type="text" placeholder=" '+title+'" />' );
            $(this).html( '<input type="text" placeholder="*"/>' );
        } );

        $('#index_formacoes').DataTable( {

            dom: 'Blfrtip',
            buttons: ['excel', 'print'],
            order:[ 0, "desc"],
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

        // Apply the search
        table.columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    } );
</script>

<script>
    $(document).ready(function() {
        $('#index_contactos').DataTable( {
            dom: 'Blfrtip',
            buttons: [
                'excel', 'print'
            ],
            "language": {
                "sProcessing":   "A processar...",
                "sLengthMenu":   "Mostrar _MENU_ registos",
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
