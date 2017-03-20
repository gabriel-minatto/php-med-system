<?php $this->load->view("includes/header");//carregamos o header e o menu da pagina ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Formulário de
                        <strong>Pré-cadastro</strong>
                    </h2>
                    <hr>
                    <form class="form-horizontal" method="POST" action="<?= base_url('precadastro/salvar') ?>">
                        <fieldset>
                        
                        <!-- Form Name -->
                        <legend></legend>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="nome">Nome:</label>  
                          <div class="col-md-4">
                          <input id="nome" name="nome" type="text" placeholder="nome completo" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="dataNascimento">Data de Nascimento:</label>  
                          <div class="col-md-4">
                          <input id="dataNascimento" name="dataNascimento" type="date" placeholder="" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="cpf">CPF:</label>  
                          <div class="col-md-4">
                          <input id="cpf" name="cpf" type="text" placeholder="" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="email">Email:</label>  
                          <div class="col-md-4">
                          <input id="email" name="email" type="email" placeholder="sample@sample.com" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="senha">Senha:</label>  
                          <div class="col-md-4">
                          <input id="senha" name="senha" type="password"class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
                          <div class="col-md-4">
                          <input id="telefone" name="telefone" type="text" placeholder="" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Password input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="logradouro">Logradouro:</label>
                          <div class="col-md-4">
                            <input id="logradouro" name="logradouro" type="text" placeholder="logradouro" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="cidade">Cidade:</label>  
                          <div class="col-md-4">
                          <input id="cidade" name="cidade" type="text" placeholder="cidade" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Password input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="cep">CEP:</label>
                          <div class="col-md-4">
                            <input id="cep" name="cep" type="text" placeholder="" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="uf">UF:</label>  
                          <div class="col-md-4">
                          <input id="uf" name="uf" type="text" placeholder="uf" class="form-control input-md" required="">
                            
                          </div>
                        </div>
                        
                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit"></label>
                          <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-default">Enviar</button>
                          </div>
                        </div>
                        
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <?php $this->load->view("includes/footer_sources");//carregamos os scripts e plugins da pagina ?>

</body>

</html>
