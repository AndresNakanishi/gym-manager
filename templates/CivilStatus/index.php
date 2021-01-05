<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CivilStatus[]|\Cake\Collection\CollectionInterface $civilStatus
 */
?>
<div class="civilStatus index content">
    <?= $this->Html->link(__('New Civil Status'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Civil Status') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($civilStatus as $civilStatus): ?>
                <tr>
                    <td><?= $this->Number->format($civilStatus->id) ?></td>
                    <td><?= h($civilStatus->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $civilStatus->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $civilStatus->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $civilStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $civilStatus->id)]) ?>
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
