<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>

<div class="container">
    <a href="<?= base_url('consultas/nova') ?>">
        <button class="btn btn-info btn-lg btn-block">Nova Consulta</button>
    </a>
</div>
<br>
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <?php foreach($consultas as $consulta){ ?>
                <div class="row">    
                    <div class="col-lg-12">
                        <!--<div class="col-lg-10">-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?= $consulta->medico_m ?>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-2">
                                        <div class="panel">
                                            <div class="panel-body text-center">
                                                <p>Pagamento</p>
                                                <?php if($consulta->pago == 1){ ?>
                                                    <img class="img-responsive img-border " src="<?= base_url('assets/img/pagamentos/pago.jpg') ?>" alt="">
                                                <?php }else{ ?>
                                                    <img class="img-responsive img-border " src="<?= base_url('assets/img/pagamentos/nao-pago.jpg') ?>" alt="">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <?= $consulta->diagnostico ?>
                                    </div>
                                    <?php if($consulta->pago == 0){ ?>
                                        <div class="col-lg-2 text-center">
                                			 <a href='<?= base_url("consultas/pagar/".$consulta->id) ?>'>
                                                <button type="button" class="btn btn-success">
                                    			      Pagar
                                    			 </button>
                                			 </a>
                            			 </div>
                        			 <?php } ?>
                                </div>
                                <div class="panel-footer">
                                    Especialidade de <b><?= $consulta->especialidade ?></b>
                                </div>
                            </div>
                        <!--</div>-->
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
    
<?php $this->load->view("includes/footer");//carregamos os scripts e plugins da pagina ?>