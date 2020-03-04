    <div class="column-group">
        <div class="all-50 small-100 tiny-100 align-left">
            <h5><a href="<?php echo site_url();?>/pneus/">Total Serviços</a></h5>
        </div>
        <div class="all-50 small-100 tiny-100 small align-right ">
        </div>
    </div>
    
    <hr>

    <div class="column-group">
        <div class="xlarge-25 large-20 hide-medium hide-small hide-tiny"><p class="fw-900">Matrícula</p></div>
        <div class="xlarge-25 large-20 hide-medium hide-small hide-tiny"><p class="fw-900">Custo</p></div>
        <div class="xlarge-20 large-20 hide-medium hide-small hide-tiny"><p class="fw-900">Data</p></div>
        <div class="xlarge-20 large-20 hide-medium hide-small hide-tiny"><p class="fw-900">Km</p></div>
        <div class="xlarge-10 large-20 hide-medium hide-small hide-tiny"></div>
    </div>
    
    <div class="column-group quarter-gutters">

        <?php foreach ($servicos as $servicos_item): ?>
        <div class="xlarge-25 large-20 medium-100 small-100 tiny-100">
            <a href="<?php echo site_url('servicos/edit/'.$servicos_item['id']); ?>"><?php echo $servicos_item['title']; ?></a>
        </div>
        
        <div class="xlarge-25 large-20 medium-100 small-100 tiny-100">
            <a href="<?php echo site_url('servicos/edit/'.$servicos_item['id']); ?>"><?php echo $servicos_item['custo']; ?> €</a>
        </div>

        <div class="xlarge-20 large-20 medium-100 small-100 tiny-100">
            <a href="<?php echo site_url('servicos/edit/'.$servicos_item['id']); ?>"><?php echo $servicos_item['data']; ?></a>          
        </div>

        <div class="xlarge-20 large-20 medium-100 small-100 tiny-100">
            <a href="<?php echo site_url('servicos/edit/'.$servicos_item['id']); ?>"><?php echo $servicos_item['km']; ?></a>          
        </div>
        <?php endforeach; ?>

    </div>

    <hr>

    <nav class="ink-navigation small">
        <ul class="pagination blue">
            <?php //echo $links ; ?>
        </ul>
    </nav>