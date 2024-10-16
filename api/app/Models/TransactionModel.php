<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model {
    protected $table            = 'transactions';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $allowedFields = [
        'store_id', 'type', 'date', 'value', 'cpf', 'card', 'time'
    ];

    /**
     * Método que retorna as transações agrupadas por loja.
     */
    public function getTotalTransaction() {
        return $this
        ->select(
            'store_id,
            s.store_name,
            s.store_owner,
            SUM(CASE WHEN type IN (1,4,5,6,7,8) THEN value ELSE 0 END) AS total_entradas,
            SUM(CASE WHEN type IN(2,3,9)  THEN value ELSE 0 END) AS total_saidas,
            (SUM(CASE WHEN type IN (1,4,5,6,7,8) THEN value ELSE 0 END) - SUM(CASE WHEN type IN(2,3,9) THEN value ELSE 0 END)) AS saldo'
        )
        ->join('stores s ', 'store_id = s.id', 'JOIN')
        ->groupBy('store_id')
        ->findAll();
    }
} 
