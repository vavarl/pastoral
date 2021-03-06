<?php

	$this->Html->addCrumb('Atividades');

?>
<div class="row">
    <?php if (count($turmas)>1): ?>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading clearfix">
                <span class="pull-left"><?php echo __('Selecione a turma'); ?></span>
            </header>
            <div class="panel-body">
                <div class="btn-row">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-success active">
                            <input type="radio" name="options" id="option1"> Option 1
                        </label>
                        <label class="btn btn-default">
                            <input type="radio" name="options" id="option2"> Option 2
                        </label>
                        <label class="btn btn-default">
                            <input type="radio" name="options" id="option3"> Option 3
                        </label>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php endif; ?>
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading clearfix">
                <span class="pull-left"><?php echo __('Disciplinas'); ?></span>
            </header>
            <!--tab nav start-->
            <section class="panel">
                <header class="panel-heading tab-bg-dark-navy-blue ">
                    <ul class="nav nav-tabs">
                    <?php $active = 'active'; ?>
                    <?php foreach ($disciplinas as $disciplina): ?>
                        <li class="<?= $active ?>">
                            <a data-toggle="tab" href="#<?= $disciplina['Disciplina']['id'] ?>"><?= $disciplina['Disciplina']['nome'] ?></a>
                        </li>
                        <?php $active = ''; ?>
                    <?php endforeach; ?>
                    </ul>
                </header>
                <div class="panel-body">
                    <div class="tab-content">
                        <?php $active = 'active'; ?>
                        <?php foreach ($disciplinas as $disciplina): ?>
                            <div id="<?= $disciplina['Disciplina']['id'] ?>" class="tab-pane <?= $active ?>">
                                <!-- page start-->
                                <section class="panel">
                                    <header class="panel-heading">
                                        Atividades de <?= $disciplina['Disciplina']['nome'] ?>
                                    </header>
                                    <div class="panel-body">
                                        <div class="adv-table editable-table ">
                                            <div class="clearfix">
                                                <div class="btn-group">
                                                    <button id="atividade<?= $disciplina['Disciplina']['id'] ?>_new" class="btn green"  callback="callbackAtividadeSave">
                                                        Adicionar Atividade <i class="icon-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                          <div class="space15"></div>
                                          <table class="table table-striped table-hover table-bordered tables-atividade" id="atividade<?= $disciplina['Disciplina']['id'] ?>" disciplina-id="<?= $disciplina['Disciplina']['id'] ?>" >
                                              <thead>
                                                  <tr>
                                                      <th>Nome</th>
                                                      <th>Peso</th>
                                                      <th>Editar</th>
                                                      <th>Excluir</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php foreach ($disciplina['Atividade'] as $atividade): ?>
                                                  <tr class="" atividade-id="<?= $atividade['id'] ?>" callback="callbackAtividadeSave">
                                                      <td><?= $atividade['descricao'] ?></td>
                                                      <td class="right"><?= $atividade['peso'] ?></td>
                                                      <td><a class="edit" href="javascript:;">Editar</a><a class="save hide" href="javascript:;">Salvar</a></td>
                                                      <td><a class="delete" href="javascript:;">Excluir</a></td>
                                                  </tr>
                                                <?php endforeach; ?>
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                                </section>
                                <!-- page end-->
                            </div>
                            <?php $active = ''; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
		</section>
	</div>
</div>

<!--script for this page only-->
<?php echo $this->Html->script('/js/editable-table', array('inline' => false)); ?> 
<?php echo $this->Html->script('/js/page.atividades', array('inline' => false)); ?> 
<!-- END JAVASCRIPTS -->