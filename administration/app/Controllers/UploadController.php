<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\API\ResponseTrait;
use RuntimeException;


class UploadController extends BaseController {
    /**
     * Método que retorna a view com o formulário para upload do arquivo.  
     *  @return View
     */
    public function index() {
        return view('upload');
    }

    /**
     * Método que recebe o arquivo para o processamento.
     */
    public function processFile() {
        /** @var UploadedFile $file */
        $file = $this->request->getFile('file');
        if (!$this->isValidFile($file)) {
            $return = [
                'status' => false,
                'transactions' => 'Erro ao fazer upload do arquivo.'
            ];
        }

        $filePath = WRITEPATH . 'uploads/' . $file->store();
        $return = $this->parseFile($filePath);
        echo json_encode($return);
        
    }

    /**
     * Método que valida se o arquivo é válido
     * @param File [$file] - Arquivo enviado via formulário.
     * @return Bool
     */
    private function isValidFile($file): bool {
        return $file->isValid() && !$file->hasMoved();
    }

        /**
     * Método que que lê o arquivo e extra cada campo com base nas posições fixas.
     * @param String [$filePath] - Caminho do arquivo.
     */
    private function parseFile(string $filePath) {
        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new RuntimeException("Erro ao abrir o arquivo: {$filePath}");
        }

        try {
            // Lê todas as linhas do arquivo em um array
            $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ($lines === false) {
                throw new RuntimeException("Erro ao ler o arquivo.");
            }

            $validadeTransaction = [];
            foreach ($lines as $key => $value) {
                $transactionData = $this->extractTransactionData($value);
                $status = $this->saveTransaction($transactionData);
                if(!$status) {
                    $validadeTransaction[$key] = $transactionData;
                }
            }
            if($validadeTransaction) {
                $return = [
                    'status'    => false,
                    'message'   => 'Atenção! Possível erro duante a importação, por favor importe o arquivo novamente.'
                ];
            }
            $return = [
                'status' => true,
                'message'=> 'Total de ' . count($lines) . ' transações importadas.'
            ];
            return $return;
        } catch (RuntimeException $e) {
            $return = [
                'status' => false,
                'message'=> $e->getMessage()
            ];
            return $return;
            
        }
    }

    /**
     * Método que extrai as informações do arquivo.
     * @param String [$line] - Informações do arquivo, por linha.
     * @return Array
     */
    private function extractTransactionData(string $line): array {
        return [
            'type'          => (int)substr($line, 0, 1),
            'date'          => substr($line, 1, 8),
            'value'         => (float)substr($line, 9, 10) / 100,
            'cpf'           => substr($line, 19, 11),
            'card'          => substr($line, 30, 12),
            'time'          => substr($line, 42, 6),
            'store_owner'   => trim(substr($line, 48, 14)),
            'store_name'    => trim(substr($line, 62, 19)),
        ];
    }

    /**
     * Método que salva no banco de dados as informações extraídas do arquivo.
     * @param Array [$transactionData] - Dados refernte a uma transação extraída do arquivo.
     */
    private function saveTransaction(array $transactionData) {
        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', API_URL . 'upload', [
            'form_params' => $transactionData
        ]);
        return $response->getBody();
    }
}