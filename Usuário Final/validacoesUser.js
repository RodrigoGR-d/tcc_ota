// Validação do cadastro de cliente
function validarUser() {

    var cpf = document.getElementById("cpf_cli");
    var nome = document.getElementById("nome_cli");
    var email = document.getElementById("email_cli");
    var senha = document.getElementById("senha_cli");

    if (nome.value.trim() == "") {
        alert("Preencha o nome!");
        nome.focus();
        return false;
    }

    if (cpf.value.trim() == "") {
        alert("Preencha o CPF!");
        cpf.focus();
        return false;
    }

    if (email.value.trim() == "") {
        alert("Preencha o e-mail!");
        email.focus();
        return false;
    }

    if (senha.value.trim() == "") {
        alert("Preencha a senha!");
        senha.focus();
        return false;
    }

    // Remove pontos e traço do CPF
    var cpfSemMascara = cpf.value.replace(/[^0-9]/g, "");

    if (validarCPF(cpfSemMascara) == false) {
        alert("CPF inválido! Digite um CPF válido.");
        cpf.focus();
        return false;
    }

    // Verifica o formato do e-mail
    var padraoEmail = /^[^\s@]+@[^\s@.]+(\.[^\s@.]+)+$/;

    if (padraoEmail.test(email.value.trim()) == false) {
        alert("Digite um e-mail válido!");
        email.focus();
        return false;
    }

    // Verifica tamanho mínimo da senha
    if (senha.value.length < 6) {
        alert("A senha deve ter pelo menos 6 caracteres!");
        senha.focus();
        return false;
    }

    email.value = email.value.trim();

    return true;
}


// Validação do CPF
function validarCPF(cpf) {

    if (cpf.length != 11) {
        return false;
    }

    // Verifica se todos os números são iguais
    var todosIguais = true;

    for (var i = 0; i < 11; i++) {

        if (cpf[i] < "0" || cpf[i] > "9") {
            return false;
        }

        if (cpf[i] != cpf[0]) {
            todosIguais = false;
        }
    }

    if (todosIguais == true) {
        return false;
    }

    // Primeiro dígito
    var soma = 0;

    for (var i = 0; i < 9; i++) {
        soma = soma + Number(cpf[i]) * (10 - i);
    }

    var digito = 11 - (soma % 11);

    if (digito >= 10) {
        digito = 0;
    }

    if (digito != Number(cpf[9])) {
        return false;
    }

    // Segundo dígito
    soma = 0;

    for (var i = 0; i < 10; i++) {
        soma = soma + Number(cpf[i]) * (11 - i);
    }

    digito = 11 - (soma % 11);

    if (digito >= 10) {
        digito = 0;
    }

    if (digito != Number(cpf[10])) {
        return false;
    }

    return true;
}


// Máscara do CPF
function mascaraCPF(campo) {

    var numeros = campo.value
        .replace(/[^0-9]/g, "")
        .substring(0, 11);

    var texto = "";

    for (var i = 0; i < numeros.length; i++) {

        if (i == 3 || i == 6) {
            texto = texto + ".";
        }

        if (i == 9) {
            texto = texto + "-";
        }

        texto = texto + numeros[i];
    }

    campo.value = texto;
}