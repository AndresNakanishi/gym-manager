<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoutineDay $routineDay
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $routineDay->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $routineDay->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Routine Days'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="routineDays form content">
            <?= $this->Form->create($routineDay) ?>
            <fieldset>
                <legend><?= __('Edit Routine Day') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('reps._ids', ['options' => $reps]);
                    echo $this->Form->control('routines._ids', ['options' => $routines]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
