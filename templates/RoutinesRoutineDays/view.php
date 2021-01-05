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
            <?= $this->Html->link(__('Edit Routines Routine Day'), ['action' => 'edit', $routinesRoutineDay->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Routines Routine Day'), ['action' => 'delete', $routinesRoutineDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routinesRoutineDay->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Routines Routine Days'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Routines Routine Day'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="routinesRoutineDays view content">
            <h3><?= h($routinesRoutineDay->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Routine') ?></th>
                    <td><?= $routinesRoutineDay->has('routine') ? $this->Html->link($routinesRoutineDay->routine->name, ['controller' => 'Routines', 'action' => 'view', $routinesRoutineDay->routine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Routine Day') ?></th>
                    <td><?= $routinesRoutineDay->has('routine_day') ? $this->Html->link($routinesRoutineDay->routine_day->name, ['controller' => 'RoutineDays', 'action' => 'view', $routinesRoutineDay->routine_day->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($routinesRoutineDay->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
