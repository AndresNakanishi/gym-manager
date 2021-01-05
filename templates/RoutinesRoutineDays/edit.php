<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoutinesRoutineDay $routinesRoutineDay
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $routinesRoutineDay->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $routinesRoutineDay->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Routines Routine Days'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="routinesRoutineDays form content">
            <?= $this->Form->create($routinesRoutineDay) ?>
            <fieldset>
                <legend><?= __('Edit Routines Routine Day') ?></legend>
                <?php
                    echo $this->Form->control('routine_id', ['options' => $routines]);
                    echo $this->Form->control('routine_day_id', ['options' => $routineDays]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
