<?php $this->load->view("secretarios/includes/header");//carregamos o header e o menu da pagina ?>


<div class="container">
    <div class="col-lg-10">
        <div class="row text-center">
            <h1>Consultas</h1>
        </div>
    </div>
    <BR>
    <div class="col-lg-10">
        <div class="row">
            <table class="table table-bordered table-striped table-hover table-responsive">
            	<thead>
            		<tr>
            			<th>
            				Paciente
            			</th>
            			<th>
            				Médico
            			</th>
            			<th>
            				Especialidade
            			</th>
            			<th>
            				Realizada
            			</th>
            			<th>
            				Pagamento
            			</th>
            		</tr>
            	</thead>
            	<tbody>
            <?php foreach($consultas as $consulta){ ?>
            		<tr>
            			<td>
            				<?= $consulta->paciente_m ?>
            			</td>
            			<td>
            				<?= $consulta->medico_m ?>
            			</td>
            			<td>
            				<?= $consulta->especialidade ?>
            			</td>
            			<td>
            				<?= ($consulta->done) ? "Sim" : "Não" ?>
            			</td>
            			<td>
            				<?php if($consulta->pago){ ?>
            				Pago
            				<?php }else{ ?>
            				<a href='<?= base_url("secretarios/consultas/pagar/".$consulta->id) ?>'>
                                <button type="button" class="btn btn-success">
                                    Pagar
                                </button>
                            </a>
            				<?php } ?>
            			</td>
            		</tr>
            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<?php $this->load->view("secretarios/includes/footer");//carregamos os scripts e plugins da pagina ?>