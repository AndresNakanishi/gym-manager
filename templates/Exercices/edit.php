<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercice $exercice
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exercice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exercice->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exercices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exercices form content">
            <?= $this->Form->create($exercice) ?>
            <fieldset>
                <legend><?= __('Edit Exercice') ?></legend>
                <?php
                    echo $this->Form->control('exercice_type_id', ['options' => $exerciceTypes]);
                    echo $this->Form->control('name');
                    echo $this->Form->control('image');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
