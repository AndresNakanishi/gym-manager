<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercice[]|\Cake\Collection\CollectionInterface $exercices
 */
?>
<div class="exercices index content">
    <?= $this->Html->link(__('New Exercice'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Exercices') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('exercice_type_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exercices as $exercice): ?>
                <tr>
                    <td><?= $this->Number->format($exercice->id) ?></td>
                    <td><?= $exercice->has('exercice_type') ? $this->Html->link($exercice->exercice_type->name, ['controller' => 'ExerciceTypes', 'action' => 'view', $exercice->exercice_type->id]) : '' ?></td>
                    <td><?= h($exercice->name) ?></td>
                    <td><?= h($exercice->image) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $exercice->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exercice->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exercice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercice->id)]) ?>
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
