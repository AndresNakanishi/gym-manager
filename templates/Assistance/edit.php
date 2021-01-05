<?php
    $this->assign('title', $title);
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
<hr>
<div class="panel panel-default mb-5">
    <div class="panel-body">
        <div class="col-lg-6 col-sm-6">
            <?= $this->Form->create($assistance) ?>
                <div class="form-group">
                    <?= $this->Form->control('user_id', [
                        'options' => $users,
                        'empty' => true,
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'control-label',
                            'text' => 'Cliente:',
                        ],
                        'disabled'
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('day', [
                        'class' => 'form-control',
                        'type' => 'date',
                        'label' => [
                            'class' => 'control-label',
                            'text' => 'Día:',
                        ],
                        'disabled'
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('checkin', [
                        'class' => 'form-control',
                        'type' => 'time',
                        'label' => [
                            'class' => 'control-label',
                            'text' => 'Checkin:',
                        ],
                        'disabled'
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('checkout', [
                        'class' => 'form-control',
                        'type' => 'time',
                        'label' => [
                            'class' => 'control-label',
                            'text' => 'Checkout:',
                        ],
                    ]) ?>
                </div>
                <div class="d-flex">
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => "btn btn-default text-primary"]) ?>
                    <?= $this->Form->submit('Guardar', ['class' => "btn btn-primary"]) ?>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <!-- /.panel-body -->
</div>