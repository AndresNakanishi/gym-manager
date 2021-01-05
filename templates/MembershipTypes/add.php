<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MembershipType $membershipType
 */
?>

<?php
    $this->assign('title', $title);
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
<hr>

<div class="panel panel-default mb-5">
    <div class="panel-body">
        <div class="col-lg-6 col-sm-6">
            <?= $this->Form->create($membershipType) ?>
                <div class="form-group">
                    <?= $this->Form->control('name', [
                        'class' => 'form-control',
                        'label' => [
                            'class' => 'control-label',
                            'text' => 'Nombre de la Membresía: (Requerido)',
                        ],
                        'required',
                        'placeholder' => 'Escribe el nombre de la membresía',
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('amount', [
                        'class' => 'form-control',
                        'type' => 'number',
                        'label' => [
                            'class' => 'control-label',
                            'text' => 'Valor: (Requerido)',
                        ],
                        'required',
                        'placeholder' => 'Escribe el valor mensual de la membresía',
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