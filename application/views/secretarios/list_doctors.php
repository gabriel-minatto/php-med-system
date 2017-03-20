<?php $this->load->view("secretarios/includes/header");//carregamos o header e o menu da pagina ?>


<div class="container">
    <div class="col-lg-10">
        <div class="row text-center">
            <h1>Médicos</h1>
        </div>
    </div>
    <br>
    <div class="col-lg-10">
        <div class="row">
            <a href="<?= base_url('secretarios/medicos/novo') ?>">
                <button class='btn btn-block btn-success'>Novo</button>
            </a>
        </div>
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
            				CRM
            			</th>
            			<th>
            				Especialidade
            			</th>
            			<th>
            			    &nbsp;
            			</th>
            		</tr>
            	</thead>
            	<tbody>
            <?php foreach($medicos as $medico){ ?>
            		<tr>
            			<td>
            				<?= $medico->nome ?>
            			</td>
            			<td>
            				<?= sql_date_to_br($medico->dataNascimento) ?>
            			</td>
            			<td>
            				<?= $medico->cpf ?>
            			</td>
            			<td>
            				<?= $medico->email ?>
            			</td>
            			<td>
            				<?= $medico->telefone ?>
            			</td>
            			<td>
            				<?= $medico->crm ?>
            			</td>
            			<td>
            				<?= $medico->especialidade_m ?>
            			</td>
            			<td>
            			    <a href="<?= base_url('secretarios/medicos/del/'.$medico->id) ?>">
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