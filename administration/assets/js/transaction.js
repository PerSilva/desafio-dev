/**
 * Método que abre o modal com as transações por loja
 * @param Int [store_id] - Identificador da loja
 */
function openModalDetailsTransaction(storeId, storeName) {
    $.ajax({
        type     : "GET",
        url      : baseUrl+"transactions/"+storeId,
        dataType : "HTML",
        processData: false,
        contentType: false,
    }).done(function(data){
        $('#modal-transactions').html(data);
        $('#storeName').html(storeName);
        $('#modal-transactions').modal();
    }).fail(function(data){
        showAlert('Erro!', data, 'error');
    });
}

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
