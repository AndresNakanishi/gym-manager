<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Routine[]|\Cake\Collection\CollectionInterface $routines
 */
?>
<div class="routines index content">
    <?= $this->Html->link(__('New Routine'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Routines') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($routines as $routine): ?>
                <tr>
                    <td><?= $this->Number->format($routine->id) ?></td>
                    <td><?= h($routine->name) ?></td>
                    <td><?= $this->Number->format($routine->created_by) ?></td>
                    <td><?= h($routine->created_at) ?></td>
                    <td><?= h($routine->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $routine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $routine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $routine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routine->id)]) ?>
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
