<?php

// Validação do CPF
function cpfClienteValido($cpf) {

    if (!preg_match('/^[0-9]{11}$/D', $cpf)) {
        return false;
    }

    if (preg_match('/^([0-9])\1{10}$/D', $cpf)) {
        return false;
    }

    // Primeiro e segundo dígitos verificadores
    for ($tamanho = 9; $tamanho <= 10; $tamanho++) {

        $soma = 0;

        for ($i = 0; $i < $tamanho; $i++) {
            $soma += (int)$cpf[$i] * ($tamanho + 1 - $i);
        }

        $resto = $soma % 11;

        $digito = ($resto < 2) ? 0 : 11 - $resto;

        if ((int)$cpf[$tamanho] !== $digito) {
            return false;
        }
    }

    return true;
}


// Lê os campos enviados pelo formulário
function lerCampoCliente($origem, $nome) {

    return isset($origem[$nome]) && is_string($origem[$nome])
        ? trim($origem[$nome])
        : '';
}


// Valida os dados do cliente
function validarDadosCliente($origem) {

    $dados = array();

    $rotulos = array(
        'nome_cli' => 'Nome',
        'cpf_cli' => 'CPF',
        'email_cli' => 'E-mail',
        'senha_cli' => 'Senha'
    );

    // Verifica se todos os campos foram preenchidos
    foreach ($rotulos as $campo => $rotulo) {

        $dados[$campo] = lerCampoCliente($origem, $campo);

        if ($dados[$campo] === '') {

            return array(
                'erro' => 'Preencha o campo: ' . $rotulo . '.',
                'dados' => $dados
            );
        }
    }


    // Remove máscara do CPF
    $dados['cpf_cli'] = preg_replace(
        '/[^0-9]/',
        '',
        $dados['cpf_cli']
    );


    // Valida CPF
    if (!cpfClienteValido($dados['cpf_cli'])) {

        return array(
            'erro' => 'Informe um CPF válido com 11 dígitos.',
            'dados' => $dados
        );
    }


    // Valida e-mail
    if (!filter_var($dados['email_cli'], FILTER_VALIDATE_EMAIL)) {

        return array(
            'erro' => 'Informe um e-mail válido.',
            'dados' => $dados
        );
    }


    // Valida senha
    if (strlen($dados['senha_cli']) < 6) {

        return array(
            'erro' => 'A senha deve ter pelo menos 6 caracteres.',
            'dados' => $dados
        );
    }


    return array(
        'erro' => '',
        'dados' => $dados
    );
}

?>