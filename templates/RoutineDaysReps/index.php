<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoutineDaysRep[]|\Cake\Collection\CollectionInterface $routineDaysReps
 */
?>
<div class="routineDaysReps index content">
    <?= $this->Html->link(__('New Routine Days Rep'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Routine Days Reps') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('routine_day_id') ?></th>
                    <th><?= $this->Paginator->sort('rep_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($routineDaysReps as $routineDaysRep): ?>
                <tr>
                    <td><?= $this->Number->format($routineDaysRep->id) ?></td>
                    <td><?= $routineDaysRep->has('routine_day') ? $this->Html->link($routineDaysRep->routine_day->name, ['controller' => 'RoutineDays', 'action' => 'view', $routineDaysRep->routine_day->id]) : '' ?></td>
                    <td><?= $routineDaysRep->has('rep') ? $this->Html->link($routineDaysRep->rep->id, ['controller' => 'Reps', 'action' => 'view', $routineDaysRep->rep->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $routineDaysRep->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $routineDaysRep->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $routineDaysRep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routineDaysRep->id)]) ?>
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
