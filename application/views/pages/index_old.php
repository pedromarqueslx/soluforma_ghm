<h5>RELATÓRIOS</h5>
<div class="column-group gutters quarter-top-space">
    <div class="all-25 small-100 tiny-100">
        
        <fieldset>
            <legend><strong>Faturado</strong></legend>
            <div class="control-group quarter-top-space small">
         
            <?php foreach ($equipamentos as $equipamentos_item): ?>

                <div class="column-group quarter-gutters ">
                    <div class="xlarge-50 large-50 medium-50 small-100 tiny-33y-100 ">
                        <a href="<?php echo site_url('equipamentos/total/'.$equipamentos_item['title']); ?>"><span class="fa fa-truck"></span> <?php echo $equipamentos_item['title']; ?></a>
                    </div>
                    <div class="xlarge-50 large-50 medium-50 small-100 tiny-100">
                        <a href="<?php echo site_url('equipamentos/total/'.$equipamentos_item['title']); ?>"><span class="fa fa-euro"></span> 
                        <?php 
                        $title = $equipamentos_item['title'];
                        $this->db->select("(SELECT SUM(custo) FROM entidades WHERE title= '$title' AND categoria_entidades='1') as score ");
                        $q=$this->db->get('entidades');
                        $row=$q->row();
                        $score=$row->score;
                        echo $score;
                        ?></a>
                    </div>

                </div>

            <?php endforeach; ?>
            </div>
        </fieldset>

    </div>
    <div class="all-25 small-100 tiny-100">

        <fieldset>
            <legend>Custo de Manutenção</legend>
            <div class="control-group quarter-top-space small">
         
            <?php foreach ($equipamentos as $equipamentos_item): ?>

                <div class="column-group quarter-gutters ">
                    <div class="xlarge-50 large-50 medium-50 small-100 tiny-100 ">
                        <a href="<?php echo site_url('/artigos_oficina/total/'.$equipamentos_item['title']); ?>"><span class="fa fa-truck"></span> <?php echo $equipamentos_item['title']; ?></a>
                    </div>
                    <div class="xlarge-50 large-50 medium-50 small-100 tiny-100">
                    <a href="<?php echo site_url('/artigos_oficina/total/'.$equipamentos_item['title']); ?>"><span class="fa fa-euro"></span> 
                    <?php 
                    $title = $equipamentos_item['title'];
                    $this->db->select("(SELECT SUM(custo) FROM artigos WHERE title= '$title' AND categoria_artigo='1' ) as score ");
                    $q=$this->db->get('artigos');
                    $row=$q->row();
                    $score=$row->score;
                    echo $score;
                    ?></a>
                    </div>

                </div>
                
            <?php endforeach; ?>
            </div>
        </fieldset>   

    </div>
    <div class="all-25 small-100 tiny-100">

        <fieldset>
            <legend>Consumo de Combustível</legend>
            <div class="control-group quarter-top-space small">
         
            <?php foreach ($equipamentos as $equipamentos_item): ?>

                <div class="column-group quarter-gutters">
                    <div class="xlarge-50 large-50 medium-50 small-100 tiny-100 ">
                        <a href="<?php echo site_url('/combustivel/total/'.$equipamentos_item['title']); ?>"><span class="fa fa-truck"></span> <?php echo $equipamentos_item['title']; ?></a>
                    </div>
                    <div class="xlarge-50 large-50 medium-50 small-100 tiny-100">
                        <a href="<?php echo site_url('/combustivel/total/'.$equipamentos_item['title']); ?>"><span class="fa fa-euro"></span> 
                        <?php 
                        $title = $equipamentos_item['title'];
                        $this->db->select("(SELECT SUM(custo) FROM artigos WHERE title= '$title' AND categoria_artigo='2') as score ");
                        $q=$this->db->get('artigos');
                        $row=$q->row();
                        $score=$row->score;
                        echo $score;
                        ?></a>
                    </div>

                </div>
                
            <?php endforeach; ?>
            </div>
        </fieldset>   
             
    </div>
    <div class="all-25 small-100 tiny-100">

        <fieldset>
            <legend>Pneus</legend>
            <div class="control-group quarter-top-space small">
         
            <?php foreach ($equipamentos as $equipamentos_item): ?>

                <div class="column-group quarter-gutters">
                    <div class="xlarge-50 large-50 medium-50 small-100 tiny-100 ">
                        <a href="<?php echo site_url('/pneus/total/'.$equipamentos_item['title']); ?>"><span class="fa fa-truck"></span> <?php echo $equipamentos_item['title']; ?></a>
                    </div>
                    <div class="xlarge-50 large-50 medium-50 small-100 tiny-100">
                        <a href="<?php echo site_url('/pneus/total/'.$equipamentos_item['title']); ?>"><span class="fa fa-euro"></span> 
                        <?php 
                        $title = $equipamentos_item['title'];
                        $this->db->select("(SELECT SUM(custo) FROM artigos WHERE title= '$title' AND categoria_artigo='6') as score ");
                        $q=$this->db->get('artigos');
                        $row=$q->row();
                        $score=$row->score;
                        echo $score;
                        ?></a>
                    </div>

                </div>
                
            <?php endforeach; ?>
            </div>
        </fieldset>   
             
    </div>     
</div> 

<hr>


<h5>REGISTOS</h5>
<div class="column-group gutters top-space">
    <div class="all-25 small-100 tiny-100">

        <fieldset>
            <legend><a href="<?php echo site_url();?>/artigos_oficina/">Oficina</a></legend>
            <div class="control-group quarter-top-space">

                <?php foreach ($artigos_oficina as $artigos_oficina_item):  ?>
                <div class="column-group quarter-gutters small">
                    <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                        <a href="<?php echo site_url('artigos_oficina/edit/'.$artigos_oficina_item['id']); ?>"><?php echo $artigos_oficina_item['title']; ?></a>
                    </div>
                    <div class="xlarge-33 large-33 medium-33 small-33 tiny-33">
                        <a href="<?php echo site_url('artigos_oficina/edit/'.$artigos_oficina_item['id']); ?>"><?php echo $artigos_oficina_item['custo']; ?> €</a>
                    </div>
                    <div class="xlarge-33 large-33 medium-33 small-33 tiny-33">
                        <a href="<?php echo site_url('artigos_oficina/edit/'.$artigos_oficina_item['id']); ?>"><?php echo $artigos_oficina_item['data']; ?></a>
                    </div>
                </div>
                <?php endforeach; ?> 

            </div>
        </fieldset>

    </div>    
    <div class="all-25 small-100 tiny-100">

        <fieldset>
            <legend><a href="<?php echo site_url();?>/combustivel/">Combustível</a></legend>
            <div class="control-group quarter-top-space">

            <?php foreach ($combustivel as $combustivel_item): ?>
            <div class="column-group quarter-gutters small">
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('combustivel/edit/'.$combustivel_item['id']); ?>"><?php echo $combustivel_item['title']; ?></a>
                </div>
        
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('combustivel/edit/'.$combustivel_item['id']); ?>"><?php echo $combustivel_item['custo']; ?> €</a>
                </div>

                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('combustivel/edit/'.$combustivel_item['id']); ?>"><?php echo $combustivel_item['data']; ?></a>          
                </div>
            </div>
            <?php endforeach; ?>

            </div>
        </fieldset>

    </div>    
    <div class="all-25 small-100 tiny-100">

        <fieldset>
            <legend><a href="<?php echo site_url();?>/imposto_selo/">Imposto Selo</a></legend>
            <div class="control-group quarter-top-space">

            <?php foreach ($imposto_selo as $imposto_selo_item): ?>
            <div class="column-group quarter-gutters small">
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('imposto_selo/edit/'.$imposto_selo_item['id']); ?>"><?php echo $imposto_selo_item['title']; ?></a>
                </div>
        
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('imposto_selo/edit/'.$imposto_selo_item['id']); ?>"><?php echo $imposto_selo_item['custo']; ?> €</a>
                </div>

                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('imposto_selo/edit/'.$imposto_selo_item['id']); ?>"><?php echo $imposto_selo_item['data']; ?></a>          
                </div>
            </div>
            <?php endforeach; ?>

            </div>
        </fieldset>

    </div>    
    <div class="all-25 small-100 tiny-100">

        <fieldset>
            <legend><a href="<?php echo site_url();?>/pneus/">Pneus</a></legend>
            <div class="control-group quarter-top-space">

            <?php foreach ($pneus as $pneus_item): ?>
            <div class="column-group quarter-gutters small">
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('pneus/edit/'.$pneus_item['id']); ?>"><?php echo $pneus_item['title']; ?></a>
                </div>
        
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('pneus/edit/'.$pneus_item['id']); ?>"><?php echo $pneus_item['custo']; ?> €</a>
                </div>

                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('pneus/edit/'.$pneus_item['id']); ?>"><?php echo $pneus_item['data']; ?></a>          
                </div>
            </div>
            <?php endforeach; ?>

            </div>
        </fieldset>

    </div>
    <div class="all-25 small-100 tiny-100">

         <fieldset>
            <legend><a href="<?php echo site_url();?>/multas/">Multas</a></legend>
            <div class="control-group quarter-top-space">

            <?php foreach ($multas as $multas_item): ?>
            <div class="column-group quarter-gutters small">
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('multas/edit/'.$multas_item['id']); ?>"><?php echo $multas_item['title']; ?></a>
                </div>
        
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('multas/edit/'.$multas_item['id']); ?>"><?php echo $multas_item['custo']; ?> €</a>
                </div>

                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('multas/edit/'.$multas_item['id']); ?>"><?php echo $multas_item['data']; ?></a>          
                </div>
            </div>
            <?php endforeach; ?>

            </div>
        </fieldset>

    </div>    
    <div class="all-25 small-100 tiny-100">
        <fieldset>
            <legend><a href="<?php echo site_url();?>/viaverde/">Via Verde</a></legend>
            <div class="control-group quarter-top-space">

            <?php foreach ($viaverde as $viaverde_item): ?>
            <div class="column-group quarter-gutters small">
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('viaverde/edit/'.$viaverde_item['id']); ?>"><?php echo $viaverde_item['title']; ?></a>
                </div>
        
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('viaverde/edit/'.$viaverde_item['id']); ?>"><?php echo $viaverde_item['custo']; ?> €</a>
                </div>

                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('viaverde/edit/'.$viaverde_item['id']); ?>"><?php echo $viaverde_item['data']; ?></a>          
                </div>
            </div>
            <?php endforeach; ?>

            </div>
        </fieldset>        

    </div>    
    <div class="all-25 small-100 tiny-100">

        <fieldset>
            <legend><a href="<?php echo site_url();?>/seguros_equipamento/">Seguros Equipamento</a></legend>
            <div class="control-group quarter-top-space">

            <?php foreach ($seguros_equipamento as $seguros_equipamento_item): ?>
            <div class="column-group quarter-gutters small">
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('seguros_equipamento/edit/'.$seguros_equipamento_item['id']); ?>"><?php echo $seguros_equipamento_item['title']; ?></a>
                </div>
        
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('seguros_equipamento/edit/'.$seguros_equipamento_item['id']); ?>"><?php echo $seguros_equipamento_item['custo']; ?> €</a>
                </div>

                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('seguros_equipamento/edit/'.$seguros_equipamento_item['id']); ?>"><?php echo $seguros_equipamento_item['data']; ?></a>          
                </div>
            </div>
            <?php endforeach; ?>

            </div>
        </fieldset>

    </div>    
    <div class="all-25 small-100 tiny-100">

        <fieldset>
            <legend><a href="<?php echo site_url();?>/seguros_carga/">Seguros Carga</a></legend>
            <div class="control-group quarter-top-space">

            <?php foreach ($seguros_carga as $seguros_carga_item): ?>
            <div class="column-group quarter-gutters small">
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('seguros_carga/edit/'.$seguros_carga_item['id']); ?>"><?php echo $seguros_carga_item['title']; ?></a>
                </div>
        
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('seguros_carga/edit/'.$seguros_carga_item['id']); ?>"><?php echo $seguros_carga_item['custo']; ?> €</a>
                </div>

                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('seguros_carga/edit/'.$seguros_carga_item['id']); ?>"><?php echo $seguros_carga_item['data']; ?></a>          
                </div>
            </div>
            <?php endforeach; ?>

            </div>
        </fieldset>

    </div>    
    <div class="all-25 small-100 tiny-100">
        
        <fieldset>
            <legend><a href="<?php echo site_url();?>/seguros_funcionario/">Seguros Funcionários</a></legend>
            <div class="control-group quarter-top-space">

            <?php foreach ($seguros_funcionario as $seguros_funcionario_item): ?>
            <div class="column-group quarter-gutters small">
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('seguros_funcionario/edit/'.$seguros_funcionario_item['id']); ?>"><?php echo $seguros_funcionario_item['title']; ?></a>
                </div>
        
                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('seguros_funcionario/edit/'.$seguros_funcionario_item['id']); ?>"><?php echo $seguros_funcionario_item['custo']; ?> €</a>
                </div>

                <div class="xlarge-33 large-33 medium-33 small-33 tiny-33 ">
                    <a href="<?php echo site_url('seguros_funcionario/edit/'.$seguros_funcionario_item['id']); ?>"><?php echo $seguros_funcionario_item['data']; ?></a>          
                </div>
            </div>
            <?php endforeach; ?>

            </div>
        </fieldset>

    </div>

</div>