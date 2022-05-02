<div class="container">

    <div class="row mt-5">
        <div class="col-md-2">
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                Nova Conta
            </a>
        </div>
        <div class="col-md-2 offset-md-7 mt-3">
            <input type="month" id="month" name="month" value="<?= set_value('month') ?>">
        </div>
    </div>

    <?php echo form_error('parceiro', '<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_error('descricao', '<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_error('valor', '<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_error('ano', '<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_error('mes', '<div class="alert alert-danger">', '</div>'); ?>

    <div class="collapse" id="collapseForm">
        <div class="row">
            <div class="col-md-6 mx-auto border mt-5 pt-3 pb-3">
                <form method="POST" id="contas-form">
                
                    <input class="form-control" value="<?= set_value('parceiro') ?>" id="parceiro" name="parceiro" type="text" placeholder="Devedor / Credor"><br>
                    <input class="form-control" value="<?= set_value('descricao') ?>" id="descricao" name="descricao" type="text" placeholder="Descrição"><br>
                    <input class="form-control" value="<?= set_value('valor') ?>" id="valor" name="valor" type="number" placeholder="Valor"><br>

                    <input type="hidden" name="id" id="conta_id">
                    
                    <div class="row pl-5">
                        <div class="col custom-control custom-radio">
                            <input value="pagar" type="radio" class="custom-control-input" id="tipoPagar" name="tipo">
                            <label class="custom-control-label" for="tipoPagar">Pagar</label>
                        </div>
                        <div class="col custom-control custom-radio">
                            <input value="receber" type="radio" class="custom-control-input" id="tipoReceber" name="tipo">
                            <label class="custom-control-label" for="tipoReceber">Receber</label>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6 offset-md-6">
                            <div class="custom-control custom-checkbox">
                                <input value='1' type="checkbox" class="custom-control-input" id="liquidadada" name="liquidada">
                                <label class="custom-control-label" for="liquidadada">Paga</label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-md-left">
                        <a class="btn btn-primary" onclick="document.getElementById('contas-form').submit();">Enviar</a>
                    </div>
                
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <?= $lista ?>
        </div>
    </div>

</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remoção de Contas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente eliminar esta conta? Esta ação é irreversível!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="confirmBtn" class="btn btn-primary">Deletar</button>
      </div>
    </div>
  </div>
</div>


<script>
row_id = 0;

$(document).ready(function(){
    $('#month').change(loadMonth);
    $('.delete_btn').click(openModal);
    $('#confirmBtn').click(deleteRow);
    $('.edit_btn').click(exibeForm);
    $('.pay_btn').click(liquidaConta);
});

function loadMonth() {
    var data = this.value.split('-');
    var ano = data[0];
    var mes = data[1];

    var v = window.location.href.split('/');
    var url = v.slice(0, 6).join('/');
    url = url + '/' + mes + '/' + ano;
    window.location.href = url;
}

function exibeForm() {
    var row_id = this.id;
    var td = $('#'+row_id).parent().parent().parent().children();
    $('#parceiro').val($(td[0]).text());
    $('#descricao').val($(td[1]).text());
    $('#valor').val($(td[2]).text());
    $('#mes').val($(td[3]).text());
    $('#ano').val($(td[4]).text());
    $('#conta_id').val(row_id);
    $('#collapseForm').collapse('show');
}

function openModal() {
    row_id = this.id;
    $('#basicExampleModal').modal();
}

function deleteRow() {
    var id = row_id;
    $.post(api('contas', 'delete_conta'), {id}, function(d, s, x){
        $('#'+row_id).parent().parent().parent().remove();
        $('#basicExampleModal').modal('hide');
    });
}

function liquidaConta() {
    var id = this.id;
    $.post(api('contas', 'status_conta'), {id}, function(d, s, x){
        $('#' + id).toggleClass('text-muted green-text');
    });
}

</script>