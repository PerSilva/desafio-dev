<?php

namespace App\Controllers;


class TransactionController extends BaseController {
    /**
     * Método que retorna a view com as transações de todas as lojas
     */
    public function index() {
        try {
            $client     = \Config\Services::curlrequest();
            $response   = $client->request('GET', API_URL . 'transactions');
            $data       = json_decode($response->getBody());

            return view('transactions', ['stores' => $data]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Método que retorna os detalhes de todas transações da loja.
     * @param Int [$storeId]
     */
    public function getDetailsTransaction($storeId) {
        $client     = \Config\Services::curlrequest();
        $response   = $client->request('GET', API_URL . 'transactions/' .  $storeId);
        $data       = json_decode($response->getBody());
        return view('modalDetailsTransaction', ['transactions'=>$data]);
    }
}

