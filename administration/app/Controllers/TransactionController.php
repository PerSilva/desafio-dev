<?php

namespace App\Controllers;


class TransactionController extends BaseController {
    /**
     * Método que retorna a view com as transações de todas as lojas
     */
    public function index() {
        try {
            return view('transactions');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

