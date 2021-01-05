<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rep[]|\Cake\Collection\CollectionInterface $reps
 */
?>
<div class="reps index content">
    <?= $this->Html->link(__('New Rep'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reps') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exercice_id') ?></th>
                    <th><?= $this->Paginator->sort('series') ?></th>
                    <th><?= $this->Paginator->sort('repetition') ?></th>
                    <th><?= $this->Paginator->sort('order') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reps as $rep): ?>
                <tr>
                    <td><?= $this->Number->format($rep->id) ?></td>
                    <td><?= $rep->has('exercice') ? $this->Html->link($rep->exercice->name, ['controller' => 'Exercices', 'action' => 'view', $rep->exercice->id]) : '' ?></td>
                    <td><?= $this->Number->format($rep->series) ?></td>
                    <td><?= $this->Number->format($rep->repetition) ?></td>
                    <td><?= $this->Number->format($rep->order) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $rep->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rep->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rep->id)]) ?>
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
