<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CNAB | Upload Arquivo</title>

        <!-- Base URL -->
        <script> var baseUrl = "<?php echo BASE_URL; ?>";</script> 

        <!-- Bootstrap 4 CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">

        <!-- Incluindo jQuery via CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- SweetAlert CDN -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="<?= base_url('js/jquery.blockUI.js') ?>"></script> <!-- BlockUI -->
    </head>
    <body>
        <div class="container">    
            <div class="card shadow mt-2">
                <div class="card-header">
                    <h4>Upload de Arquivo </h4>
                </div>
                <div class="card-body">
                    <div class="card shadow">
                        <div class="card-body">
                        <p>
                                <strong>Bem-vindo ao sistema de upload de arquivos!</strong>
                                Este formulário foi desenvolvido como parte de um projeto de processo seletivo e permite que você envie arquivos de texto (.txt). Por favor, selecione o arquivo que deseja enviar clicando no botão abaixo.
                            </p>
                            <ul class="list-group">
                                <li class="list-group-item">Clique no botão "Escolher arquivo".</li>
                                <li class="list-group-item">Selecione um arquivo no formato .txt do seu computador.</li>
                                <li class="list-group-item">Após selecionar o arquivo, clique em "Enviar".</li>
                                <li class="list-group-item">Certifique-se de que o arquivo está no formato correto antes de enviá-lo.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <form id="uploadForm" method="POST" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file"  aria-describedby="inputGroupFile">
                                        <label class="custom-file-label" for="file">Escolha um arquivo para upload</label>
                                    </div>
                                </div>
                                <div>
                                <div class="input-group-prepend">
                                        <button type="submit" class="btn btn-outline-success btn-lg btn-block" id="inputGroupFile">Enviar Arquivo</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Importando o Bootstrap JS -->
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= base_url( 'assets/js/upload.js' ) ?>"></script>
    </body>
</html>
