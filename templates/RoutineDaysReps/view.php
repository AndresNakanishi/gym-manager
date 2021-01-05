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
            <?= $this->Html->link(__('Edit Routine Days Rep'), ['action' => 'edit', $routineDaysRep->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Routine Days Rep'), ['action' => 'delete', $routineDaysRep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routineDaysRep->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Routine Days Reps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Routine Days Rep'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="routineDaysReps view content">
            <h3><?= h($routineDaysRep->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Routine Day') ?></th>
                    <td><?= $routineDaysRep->has('routine_day') ? $this->Html->link($routineDaysRep->routine_day->name, ['controller' => 'RoutineDays', 'action' => 'view', $routineDaysRep->routine_day->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Rep') ?></th>
                    <td><?= $routineDaysRep->has('rep') ? $this->Html->link($routineDaysRep->rep->id, ['controller' => 'Reps', 'action' => 'view', $routineDaysRep->rep->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($routineDaysRep->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
