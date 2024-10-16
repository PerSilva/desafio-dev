<?php

namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model {
    protected $table            = 'stores';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = [
        'store_name', 
        'store_owner'
    ];

    /**
     * Método que valida se a loja ja existe no banco
     * @param String [$storeName] - Nome da Loja.
     * @param String [$ownerName] - Proprietário da Loja
     */
    public function validateStore($storeName, $storeOwner) {
        $storeData = $this->where('store_name', $storeName)->first();
        if($storeData) {
            return $storeData['id'];
        } else {
            $data = [
                'store_name'  => $storeName,
                'store_owner'  => $storeOwner
            ];
            $this->insert($data);
            return $this->insertID();
        }
    }
}
