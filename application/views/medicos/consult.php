<?php $this->load->view("medicos/includes/header");//carregamos o header e o menu da pagina ?>


<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Realizar Consulta com o Paciente <?= $consulta->nome_p ?>
                </div>
                <div class="panel-body">
                    <div class="col-lg-4">
                        <div class="row">
                            <p>Nome: <?= $consulta->nome_p ?></p>
                            <p>Data de Nascimento: <?= sql_date_to_br($consulta->dataNascimento) ?></p>
                            <p>CPF: <?= $consulta->cpf ?></p>
                            <p>Nome: <?= $consulta->email ?></p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-horizontal" method='POST' action="<?= base_url('medicos/consultas/salvar/'.$consulta->consulta_id) ?>">
                            
                            <!-- Text input-->
                            <div class="form-group">
                              <label for="valor">Valor da Consulta:</label>  
                                  <input id="valor" name="valor" type="text" placeholder="" class="form-control input-md" required="">
                            </div>
                            
                            <!-- Textarea -->
                            <div class="form-group">
                              <label for="diagnostico">Diagnostico:</label>
                                <textarea class="form-control" id="diagnostico" name="diagnostico" rows=8></textarea>
                            </div>
                            
                            <!-- Button -->
                            <div class="form-group">
                                <button id="submit" name="submit" class="btn btn-success">Finalizar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-footer">
                    Verifique seu diagnóstico antes de confirmar.
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php $this->load->view("medicos/includes/footer");//carregamos os scripts e plugins da pagina ?>