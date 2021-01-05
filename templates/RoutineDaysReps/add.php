<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoutineDaysRep $routineDaysRep
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Routine Days Reps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="routineDaysReps form content">
            <?= $this->Form->create($routineDaysRep) ?>
            <fieldset>
                <legend><?= __('Add Routine Days Rep') ?></legend>
                <?php
                    echo $this->Form->control('routine_day_id', ['options' => $routineDays]);
                    echo $this->Form->control('rep_id', ['options' => $reps]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
