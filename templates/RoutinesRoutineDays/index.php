<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoutinesRoutineDay[]|\Cake\Collection\CollectionInterface $routinesRoutineDays
 */
?>
<div class="routinesRoutineDays index content">
    <?= $this->Html->link(__('New Routines Routine Day'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Routines Routine Days') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('routine_id') ?></th>
                    <th><?= $this->Paginator->sort('routine_day_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($routinesRoutineDays as $routinesRoutineDay): ?>
                <tr>
                    <td><?= $this->Number->format($routinesRoutineDay->id) ?></td>
                    <td><?= $routinesRoutineDay->has('routine') ? $this->Html->link($routinesRoutineDay->routine->name, ['controller' => 'Routines', 'action' => 'view', $routinesRoutineDay->routine->id]) : '' ?></td>
                    <td><?= $routinesRoutineDay->has('routine_day') ? $this->Html->link($routinesRoutineDay->routine_day->name, ['controller' => 'RoutineDays', 'action' => 'view', $routinesRoutineDay->routine_day->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $routinesRoutineDay->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $routinesRoutineDay->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $routinesRoutineDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routinesRoutineDay->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
