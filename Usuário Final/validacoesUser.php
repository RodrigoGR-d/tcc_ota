<?php
// Validações compartilhadas pelo cadastro, atualização e exclusão.
function cpfUserValido($cpf) {
    if (!preg_match('/^[0-9]{11}$/D', $cpf) || preg_match('/^([0-9])\1{10}$/D', $cpf)) return false;
    for ($tamanho = 9; $tamanho <= 10; $tamanho++) {
        $soma = 0;
        for ($i = 0; $i < $tamanho; $i++) $soma += (int)$cpf[$i] * ($tamanho + 1 - $i);
        $resto = $soma % 11;
        if ((int)$cpf[$tamanho] !== ($resto < 2 ? 0 : 11 - $resto)) return false;
    }
    return true;
}

function encerrarComErroUser($mensagem, $status = 422) {
    http_response_code($status);
    header('Content-Type: text/html; charset=UTF-8');
    echo '<p>' . htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') . '</p>';
    echo '<p><a href="formAluno.php">Voltar ao formulário</a></p>';
    exit;
}

function lerCampoUser($origem, $nome) {
    return isset($origem[$nome]) && is_string($origem[$nome]) ? trim($origem[$nome]) : '';
}

function validarDadosUser($origem) {
    $dados = array();
    $rotulos = array('cpf_cli' => 'CPF', 'nome_cli' => 'Nome', 'email_cli' => 'E-mail', 'senha_cli' => 'senha');
    foreach ($rotulos as $campo => $rotulo) {
        $dados[$campo] = lerCampoUser($origem, $campo);
        if ($dados[$campo] === '') encerrarComErroUser('Preencha o campo: ' . $rotulo . '.');
    }
    if (!cpfUserValido($dados['cpf_cli'])) encerrarComErroUser('Informe um CPF válido com exatamente 11 dígitos.');
    // Apenas o formato do endereço; não consulta a existência da caixa postal.
    if (!filter_var($dados['email_cli'], FILTER_VALIDATE_EMAIL) ||
        !preg_match('/@[^@]+\.[a-zA-Z]{2,63}$/D', $dados['email_cli'])) {
        encerrarComErroUser('Informe um e-mail no formato nome@dominio.com.');
    }
    return $dados;
}