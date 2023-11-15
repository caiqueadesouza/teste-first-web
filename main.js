$(document).ready(function () {

    loadUsers();

    //Carregar Usuários
    function loadUsers() {
        $.ajax({
            url: '/teste-first/teste-first-api/api.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                updateTable(data);
            },
            error: function (error) {
                console.error('Erro ao obter usuários:', error);
            }
        });
    }


    //Atulizar Lista
    function updateTable(users) {
        var tableBody = $('#usersTable tbody');
        tableBody.empty();

        for (var i = 0; i < users.length; i++) {
            var user = users[i];
            var row = '<tr>' +
                '<th scope="row">' + (i + 1) + '</th>' +
                '<td>' + user.nome + '</td>' +
                '<td>' + user.email + '</td>' +
                '<td>' + formatarData(user.created_at) + '</td>' +
                '</tr>';
            tableBody.append(row);
        }
    }


    //Novo Usuário
    window.saveUser = function () {
        if (validateForm()) {
            $.ajax({
                url: '/teste-first/teste-first-api/api.php',
                type: 'POST',
                dataType: 'json',
                data: $('#registrationForm').serialize(),
                success: function (data) {
                    loadUsers();
                    clearFormFields();
                    $('#exampleModal').modal('hide');

                    if (data.message) {
                        showSuccess(data.message);
                    } else {
                        $('#successMessage').hide();
                    }
                },
                error: function (error) {
                    if (error.responseJSON && error.responseJSON.errors) {
                        showError(error.responseJSON.errors);
                    } else {
                        showError({
                            'error': 'Ocorreu um erro inesperado. Por favor, tente novamente!'
                        });
                    }
                }
            });
        }
    }


    //Apagar formulário
    function clearFormFields() {
        $('#registrationForm')[0].reset();
    }


    //Apagar mensagens de erro
    function clearErrors() {
        $('#errorList').empty();
        $('#errorMessage').hide();
    }


    //Mensagem de usuário criado com sucesso
    function showSuccess(message) {
        $('#successMessage').text(message).show();
        $('#errorMessage').hide();
    }


    //Mostrar erros do back end
    function showError(errors) {
        var errorList = $('#errorList');
        errorList.empty();

        for (var key in errors) {
            if (errors.hasOwnProperty(key)) {
                var errorMessage = errors[key];
                var listItem = $('<li>').text(errorMessage);
                errorList.append(listItem);
            }
        }

        $('#errorMessage').show();
        $('#successMessage').hide();
    }


    //Fechar formulário
    $('#exampleModal').on('hidden.bs.modal', function () {
        clearErrors();
    });

    //Formatar data
    function formatarData(dataString) {
        const data = new Date(dataString);

        // Obtém o dia, mês e ano
        const dia = String(data.getDate()).padStart(2, '0');
        const mes = String(data.getMonth() + 1).padStart(2, '0');
        const ano = data.getFullYear();

        const dataFormatada = dia + '/' + mes + '/' + ano;

        return dataFormatada;
    }

    function validateForm() {
        //Aqui iria as válidações do front end
        //Não foi implementada para que fosse verificado as validações do back
        return true;
    }
});
