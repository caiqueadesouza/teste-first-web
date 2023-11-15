<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste First</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <div class="d-flex justify-content-between mt-5">
            <div>
                <h2>Usuários</h2>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Novo Usuário
                </button>
            </div>
        </div>

        <hr>

        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage" style="display: none;">
        </div>

        <table id="usersTable" class="table shadow-sm table-striped p-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOME</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">CRIADO EM</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="alert alert-danger mt-3" role="alert" id="errorMessage" style="display: none;">
                    <ul id="errorList"></ul>
                </div>

                <form id="registrationForm">
                    <div class="modal-body">

                        <div class="mb-2">
                            <label for="nome" class="col-form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required minlength="3" maxlength="50" placeholder="Informe seu nome">
                        </div>

                        <div class="mb-2">
                            <label for="email" class="col-form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Informe seu e-mail">
                        </div>

                        <div class="mb-2">
                            <label for="senha" class="col-form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required minlength="6" maxlength="20" placeholder="Informe sua senha">
                        </div>

                        <div class="mb-2">
                            <label for="confirmSenha" class="col-form-label">Confirmação de Senha</label>
                            <input type="password" class="form-control" id="confirmSenha" name="confirmSenha" required minlength="6" maxlength="20" placeholder="Confirme sua senha">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="saveUser()">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="main.js" defer></script>
</body>

</html>