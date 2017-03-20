<?php $this->load->view("secretarios/includes/header");//carregamos o header e o menu da pagina ?>


<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-2">
            <div class="row text-center">
                <h1>Novo Médico</h1>
            </div>
        </div>
    </div>
    <br>
    <div class="col-lg-6 col-lg-offset-2">
        <div class="row">
            <form class="form-horizontal" method="post" action="<?= base_url('secretarios/medicos/add') ?>">
                <!-- Text input-->
                <div class="form-group">
                    <label for="nome">Nome:</label>  
                    <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="dt_nasc">Data de Nascimento</label>  
                    <input id="dt_nasc" name="dt_nasc" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="cpf">CPF:</label> 
                    <input id="cpf" name="cpf" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                      <label for="email">Email:</label>
                      <input id="email" name="email" type="email" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Password input-->
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input id="telefone" name="telefone" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="senha">Senha:</label>  
                    <input id="senha" name="senha" type="password" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="crm">CRM:</label>  
                    <input id="crm" name="crm" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="especialidade">Especialidade:</label>  
                    <input id="especialidade" name="especialidade" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Textarea -->
                <div class="form-group">
                    <label for="espec_desc">Descrição da Especialidade:</label>
                    <textarea class="form-control" id="espec_desc" name="espec_desc"></textarea>
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="logradouro">Logradouro:</label>  
                    <input id="logradouro" name="logradouro" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Password input-->
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input id="cidade" name="cidade" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Password input-->
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input id="cep" name="cep" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Text input-->
                <div class="form-group">
                    <label for="uf">UF:</label>  
                    <input id="uf" name="uf" type="text" placeholder="" class="form-control input-md" required="">
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label for="submit"></label>
                    <button id="submit" name="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
<?php $this->load->view("secretarios/includes/footer");//carregamos os scripts e plugins da pagina ?>