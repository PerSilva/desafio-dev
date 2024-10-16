/**
 * Método que enviar o arquivo para o processamento
 */
$(document).on('submit', '#uploadForm', function(e) {
    e.preventDefault();

    let formData = new FormData($('#uploadForm')[0]);
    let result = validateFile();
    if(!result) {
        $.ajax({
            type     : "POST",
            url      : baseUrl,
            data: formData,
            dataType : "JSON",
            processData: false,
            contentType: false,
        }).done(function(data){
            if(data.status) {
                showAlert('Sucesso.', data.message, 'success');
                location = baseUrl+'transactions';
            } else {
                showAlert('Atenção!', data.message, 'warning');
            }  
        }).fail(function(data){
            showAlert('Erro!', data.message, 'error');
        });
    }  else {
        showAlert('Obrigatório arquivo .txt', result, 'warning');
    }
});

/**
 * Método que exibe as notificações de acordo com os parâmetros passados.
 * @param {String} title 
 * @param {String} text 
 * @param {String} icon 
 */
function showAlert(title, text, icon) {
    swal({
        title: title,
        text: text,
        icon: icon
    });
}

/**
 * Método que valida se o arquivo foi selecionado e esta no formato válido.
 */
function validateFile() {
    let fileInput = $('#file')[0];
    let file = fileInput.files[0];

    if (file) {
        let fileName = file.name; 
        let fileExtension = fileName.split('.').pop().toLowerCase();
        let allowedExtensions = ['txt'];

        if (allowedExtensions.indexOf(fileExtension) === -1) {
            return 'O arquivo ' + file.name + ' não é válido.';
        } else {
            return false
        }
    } else {
        return 'Selecione um arquivo.'
    }
}