<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>

<div class="container">
    <div class="col-lg-12">
        <div class="row">
             <div class="panel panel-primary">
                <div class="panel-heading">
                    Nova Consulta
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post">
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="espec_filter">Filtrar por Especialidade:</label>  
                          <div class="col-md-4">
                          <input id="espec_filter" name="espec_filter" type="text" placeholder="" class="form-control input-md">
                            
                          </div>
                        </div>
                        
                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="filter"></label>
                          <div class="col-md-4">
                            <button id="filter" name="filter" class="btn btn-info">Buscar</button>
                          </div>
                        </div>
                    </form>
                    <form class="form-horizontal" method="post" action="<?= base_url('consultas/create') ?>">
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="medico">Médico</label>
                          <div class="col-md-4">
                            <select id="medico" name="medico" class="form-control">
                                <?php foreach($medicos as $medico){ ?>
                                      <option value="<?= $medico->m_id ?>"><?= $medico->m_nome." | ".$medico->e_nome ?></option>
                                 <?php } ?>
                            </select>
                          </div>
                        </div>
                        
                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-primary">Salvar</button>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Verifique seus dados antes de confirmar.
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php $this->load->view("includes/footer");//carregamos os scripts e plugins da pagina ?>