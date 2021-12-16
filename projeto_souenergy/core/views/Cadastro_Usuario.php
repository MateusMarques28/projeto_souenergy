<div class="container">
    <div classs="row">
        <div class="col-sm-6 offset-sm-3 my-5 ">
            <h3 class="text-center">Registrar Novo Usuário</h3>

            <form action="/Cadastro_Usuario" method="post">

                <div class="my-3">
                    <label for="">Nome Completo</label>
                    <input type="text" name="nome_completo" placeholder="Nome Completo" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">Email</label>
                    <input type="email" name="text_email" placeholder="Email" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">Telefone</label>
                    <input type="text" name="text_telefone" placeholder="Digite seu numero" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">Senha</label>
                    <input type="password" name="text_senha_1" placeholder="Senha" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">Confirme sua senha</label>
                    <input type="password" name="text_senha_2" placeholder="Confirme sua senha" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">CPF</label>
                    <input type="text" name="text_cpf" placeholder="Digite seu CPF" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">Cidade</label>
                    <input type="text" name="text_cidade" placeholder="Cidade" class="form-control" required>
                </div>

                <div class="my-3">
                    <label for="">UF</label>
                    <input type="text" name="text_uf" placeholder="UF" class="form-control" required>
                </div>

                <div class="my-4">
                    <input type="submit" value="Criar conta" class="btn btn-primary">
                </div>

                <br>
                <br>
            </form>
        </div>
    </div>
</div>