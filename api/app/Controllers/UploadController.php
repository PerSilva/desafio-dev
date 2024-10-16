<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TransactionModel;
use App\Models\StoreModel;

class UploadController extends ResourceController {
    /**
     * Método que salva no banco de dados as informações extraídas do arquivo.
     */
    public function saveTransaction() {
        try {
            $storeModel         = new StoreModel();
            $transactionModel   = new TransactionModel();
            $post = $this->request->getPost();

            $storeId                        = $storeModel->validateStore($post['store_name'], $post['store_owner']);
            $post['store_id']    = $storeId;

            unset($post['store_name'], $post['store_owner']);

            $result = $transactionModel->insert($post);
            if($result) {
                $return = [
                    'status' => true
                ];
            } else {
                $return = [
                    'status' => false,
                    'message'=> $transactionModel->getLastQuery()->getQuery()
                ];
            }
            return $this->respond($return);
        } catch (\Exception $e) {
            $return = [
                'status' => false,
                'message'=> $e->getMessage()
            ];
            return $this->respond($return); 
        }
    }
}
