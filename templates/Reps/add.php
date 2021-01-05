<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rep $rep
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Reps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reps form content">
            <?= $this->Form->create($rep) ?>
            <fieldset>
                <legend><?= __('Add Rep') ?></legend>
                <?php
                    echo $this->Form->control('exercice_id', ['options' => $exercices]);
                    echo $this->Form->control('series');
                    echo $this->Form->control('repetition');
                    echo $this->Form->control('order');
                    echo $this->Form->control('routine_days._ids', ['options' => $routineDays]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
