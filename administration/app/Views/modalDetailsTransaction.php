
<div class="modal-dialog modal-xl">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="storeName">New message</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="card shadow mt-2">
          <div class="card-body">
              <table class="table table-bordered sm">
                  <thead>
                      <tr>
                          <th>Data</th>
                          <th>Hora</th>
                          <th>Valor</th>
                          <th>Tipo</th>
                          <th>Natureza</th>
                          <th>Cartão</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php if($transactions) :?>
                          <?php foreach($transactions as $transaction) :?>
                              <tr>
                                  <td><?= date('d/m/Y', strtotime($transaction['date'])) ;?></td>
                                  <td><?= date('H:i', strtotime($transaction['time'])) ;?></td>
                                  <td>
                                      R$ <?= number_format($transaction['value'], 2, ',', '.') ;?>
                                  </td>
                                  <td>
                                      <?= $transaction['type_description']['description'];?>
                                  </td>
                                  <td>
                                      <?= $transaction['type_description']['natureza'];?>
                                  </td>
                                  <td>
                                      <?= $transaction['card'];?>
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
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>