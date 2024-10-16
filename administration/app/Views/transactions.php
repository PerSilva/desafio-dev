<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CNAB | DashBoard</title>

        <!-- Base URL -->
        <script> var baseUrl = "<?php echo BASE_URL; ?>";</script> 

        <!-- Bootstrap 4 CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">

        <!-- Incluindo jQuery via CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- SweetAlert CDN -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body>
        <div class="container">    
            <div class="card shadow mt-2">
                <div class="card-header">
                    <h4>Transações por Loja </h4>
                </div>
                <div class="card-body">
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table table-bordered sm">
                                <thead>
                                    <tr>
                                        <th>Loja</th>
                                        <th>Proprietário</th>
                                        <th>Total Entradas</th>
                                        <th>Total Saídas</th>
                                        <th>Saldo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($stores) && $stores) :?>
                                        <?php foreach($stores as $store) :?>
                                            <tr>
                                                <td><?= $store['store_name'] ;?></td>
                                                <td><?= $store['store_owner'] ;?></td>
                                                <td>
                                                    R$ <?= number_format($store['total_entradas'], 2, ',', '.') ;?>
                                                </td>
                                                <td>
                                                    R$ <?= number_format($store['total_saidas'], 2, ',', '.') ;?>
                                                </td>
                                                <td>
                                                    R$ <?= $store['saldo'] >= 0 ? '<span class="badge badge-success p-1">'. number_format($store['saldo'], 2, ',', '.') .'</span>' : '<span class="badge badge-danger p-1">'. number_format($store['saldo'], 2, ',', '.') .'</span>' ;?>
                                                </td>
                                                <td>
                                                    <a href="#" type="button" class="btn btn-primary btn-sm" onclick="openModalDetailsTransaction(<?= $store['store_id'] ;?>, '<?= $store['store_name'] ;?>')">Detalhes</a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php else :?>
                                        <tr>
                                            <td colspan="6" class="text-center">Nenhuma transação encontrada.</td>
                                        </tr>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="<?= base_url()?>" type="button" class="btn btn-secondary" id="">Página de Upload de Arquivo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-transactions" role="dialog"></div>
        <!-- Importando o Bootstrap JS -->
        <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url( 'assets/js/transaction.js' ) ?>"></script>
    </body>
</html>
