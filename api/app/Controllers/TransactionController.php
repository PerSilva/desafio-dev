<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TransactionModel;

class TransactionController extends ResourceController {
    /**
     * Método que retorna a view com as transações de todas as lojas
     */
    public function index() {
        try {
            $transactionModel = new TransactionModel();
            $stores = $transactionModel->getTotalTransaction();

            return $this->respond($stores);
        } catch (\Exception $e) {
            $return = [
                'status' => false,
                'message'=> $e->getMessage()
            ];

            return $this->respond($return); 
        }
    }

    /**
     * Método que retorna os detalhes de todas transações da loja.
     * @param Int [$storeId]
     */
    public function getDetailsTransaction($storeId) {
        helper('functions');
        $transactionModel = new TransactionModel();

        $transactions = $transactionModel->where('store_id', $storeId)->findAll();

        foreach($transactions as $key => $value) {
            $transactions[$key]['type_description'] = getTransactionDescription($value['type']);
        }
        return $this->respond($transactions);
    }
}
