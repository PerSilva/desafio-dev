<?php

    /**
     * Método que retorna a descrição da transação de acordo com o tipo.
     * @param Int [$type] - Tipo de da transação
     */
    function getTransactionDescription($type) {
        $tiposDeTransacao = [
            1 => ['description' => 'Débito',                  'natureza' => 'Entrada',    'sinal' => '+'],
            2 => ['description' => 'Boleto',                  'natureza' => 'Saída',      'sinal' => '-'],
            3 => ['description' => 'Financiamento',           'natureza' => 'Saída',      'sinal' => '-'],
            4 => ['description' => 'Crédito',                 'natureza' => 'Entrada',    'sinal' => '+'],
            5 => ['description' => 'Recebimento Empréstimo',  'natureza' => 'Entrada',    'sinal' => '+'],
            6 => ['description' => 'Vendas',                  'natureza' => 'Entrada',    'sinal' => '+'],
            7 => ['description' => 'Recebimento TED',         'natureza' => 'Entrada',    'sinal' => '+'],
            8 => ['description' => 'Recebimento DOC',         'natureza' => 'Entrada',    'sinal' => '+'],
            9 => ['description' => 'Aluguel',                 'natureza' => 'Saída',      'sinal' => '-']
        ];

        if (array_key_exists($type, $tiposDeTransacao)) {
            return $tiposDeTransacao[$type];
        }

        return [
            'description' => 'Tipo de transação desconhecido',
            'natureza' => 'Indefinida',
            'sinal' => ''
        ];
    }
?>