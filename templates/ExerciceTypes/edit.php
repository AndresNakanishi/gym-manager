<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciceType $exerciceType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exerciceType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exerciceType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Exercice Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exerciceTypes form content">
            <?= $this->Form->create($exerciceType) ?>
            <fieldset>
                <legend><?= __('Edit Exercice Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
