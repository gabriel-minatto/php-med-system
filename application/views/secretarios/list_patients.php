<?php $this->load->view("secretarios/includes/header");//carregamos o header e o menu da pagina ?>


<div class="container">
    <div class="col-lg-10">
        <div class="row text-center">
            <h1>Pacientes</h1>
        </div>
    </div>
    <br>
    <div class="col-lg-10">
        <div class="row">
            <br>
            <table class="table table-bordered table-striped table-hover table-responsive">
            	<thead>
            		<tr>
            			<th>
            				Nome
            			</th>
            			<th>
            				Data de Nascimento
            			</th>
            			<th>
            				CPF
            			</th>
            			<th>
            				Email
            			</th>
            			<th>
            				Telefone
            			</th>
            			<th>
            				Logradouro
            			</th>
            			<th>
            				Cidade
            			</th>
            			<th>
            			    Status
            			</th>
            			<th>
            			    &nbsp;
            			</th>
            		</tr>
            	</thead>
            	<tbody>
            <?php foreach($pacientes as $paciente){ ?>
            		<tr>
            			<td>
            				<?= $paciente->nome ?>
            			</td>
            			<td>
            				<?= sql_date_to_br($paciente->dataNascimento) ?>
            			</td>
            			<td>
            				<?= $paciente->cpf ?>
            			</td>
            			<td>
            				<?= $paciente->email ?>
            			</td>
            			<td>
            				<?= $paciente->telefone ?>
            			</td>
            			<td>
            				<?= $paciente->logradouro ?>
            			</td>
            			<td>
            				<?= $paciente->cidade ?>
            			</td>
            			<td>
            			    <?php if($paciente->active == 0){ ?>
                			    <a href="<?= base_url('secretarios/pacientes/ativar/'.$paciente->patient_id) ?>">
                			        <button class='btn btn-info'>Ativar</button>
                			    </a>
                			<?php }else{ ?>
                			Ativo
                			<?php } ?>
            			</td>
            			<td>
            			    <a href="<?= base_url('secretarios/pacientes/del/'.$paciente->patient_id) ?>">
            			        <button class='btn btn-danger'>Deletar</button>
            			    </a>
            			</td>
            		</tr>
            <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
<?php $this->load->view("secretarios/includes/footer");//carregamos os scripts e plugins da pagina ?>