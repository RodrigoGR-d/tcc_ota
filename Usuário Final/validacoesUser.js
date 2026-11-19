// Validações do cadastro de clientes da Pastelaria OTA.

// Esta função é chamada quando o usuário clica em CADASTRAR.
function validarUser() {

    var cpf = document.getElementById("cpf_cli");
    var nome = document.getElementById("nome_cli");
    var email = document.getElementById("email_cli");
    var senha = document.getElementById("senha_cli");

    // Verifica se todos os campos existem.
    if (!cpf || !nome || !email || !senha) {
        alert("Erro ao localizar os campos do formulário.");
        return false;
    }

    // Verifica o CPF.
    if (cpf.value.trim() === "") {
        alert("Preencha o CPF!");
        cpf.focus();
        return false;
    }

    // Verifica o nome.
    if (nome.value.trim() === "") {
        alert("Preencha o nome!");
        nome.focus();
        return false;
    }

    // Verifica o e-mail.
    if (email.value.trim() === "") {
        alert("Preencha o e-mail!");
        email.focus();
        return false;
    }

    // Verifica a senha.
    if (senha.value.trim() === "") {
        alert("Preencha a senha!");
        senha.focus();
        return false;
    }

    // Remove a máscara do CPF.
    var cpfSemMascara = cpf.value.replace(/[^0-9]/g, "");

    // Verifica se o CPF é válido.
    if (validarCPF(cpfSemMascara) === false) {
        alert("CPF inválido! Digite os 11 números de um CPF válido.");
        cpf.focus();
        return false;
    }

    // Verifica o formato do e-mail.
    var padraoEmail = /^[^\s@]+@[^\s@.]+(\.[^\s@.]+)+$/;

    if (padraoEmail.test(email.value.trim()) === false) {
        alert("Digite um e-mail no formato nome@dominio.com!");
        email.focus();
        return false;
    }

    // Remove espaços desnecessários do nome e e-mail.
    nome.value = nome.value.trim();
    email.value = email.value.trim();

    // Envia o CPF sem máscara para o PHP.
    cpf.value = cpfSemMascara;

    // true permite enviar o formulário.
    return true;
}


// Verifica se o CPF é válido.
function validarCPF(cpf) {

    if (cpf.length !== 11) {
        return false;
    }

    // Verifica se todos os caracteres são números
    // e se não são todos iguais.
    var todosIguais = true;

    for (var i = 0; i < 11; i++) {

        if (cpf[i] < "0" || cpf[i] > "9") {
            return false;
        }

        if (cpf[i] !== cpf[0]) {
            todosIguais = false;
        }
    }

    if (todosIguais === true) {
        return false;
    }

    // Calcula o primeiro dígito verificador.
    var soma = 0;

    for (var i = 0; i < 9; i++) {
        soma += Number(cpf[i]) * (10 - i);
    }

    var digito = 11 - (soma % 11);

    if (digito >= 10) {
        digito = 0;
    }

    if (digito !== Number(cpf[9])) {
        return false;
    }

    // Calcula o segundo dígito verificador.
    soma = 0;

    for (var i = 0; i < 10; i++) {
        soma += Number(cpf[i]) * (11 - i);
    }

    digito = 11 - (soma % 11);

    if (digito >= 10) {
        digito = 0;
    }

    if (digito !== Number(cpf[10])) {
        return false;
    }

    return true;
}


// Máscara automática do CPF.
function mascaraCPF(campo) {

    var numeros = campo.value.replace(/[^0-9]/g, "").substring(0, 11);

    var texto = "";

    for (var i = 0; i < numeros.length; i++) {

        if (i === 3 || i === 6) {
            texto += ".";
        }

        if (i === 9) {
            texto += "-";
        }

        texto += numeros[i];
    }

    campo.value = texto;
}