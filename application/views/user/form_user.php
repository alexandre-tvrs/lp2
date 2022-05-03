<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto" style="padding-top: 150px">


          <?php echo form_error('nome', '<div class="alert alert-danger">', '</div>'); ?>
          <?php echo form_error('snome', '<div class="alert alert-danger">', '</div>'); ?>
          <?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
          <?php echo form_error('senha', '<div class="alert alert-danger">', '</div>'); ?>
          <?php echo form_error('conf_senha', '<div class="alert alert-danger">', '</div>'); ?>
          <?php echo form_error('telefone', '<div class="alert alert-danger">', '</div>'); ?>

            <form class="card p-4" method="POST">
                <div class="row mb">
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" id="nome" value="<?php echo set_value('nome'); ?>" name="nome" class="form-control" />
                    </div>
                    </div>
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="snome">Sobrenome</label>
                        <input type="text" id="snome" value="<?= set_value('snome') ?>"  name="snome" class="form-control" /><br>
                    </div>
                    </div>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" value="<?= set_value('email') ?>"  name="email" class="form-control" />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="senha">Senha</label>
                    <input type="password" id="senha" value="<?= set_value('senha') ?>" name="senha" class="form-control" /><br>
                    <label class="form-label" for="conf_senha">Confirmar a senha</label>
                    <input type="password" id="conf_senha" value="<?= set_value('conf_senha') ?>" name="conf_senha" class="form-control" />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="telefone">Telefone</label>
                    <input type="text" id="telefone" value="<?= set_value('telefone') ?>" name="telefone" class="form-control" />
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">ENVIAR</button>
            </form>
        </div>
    </div>
</div>
