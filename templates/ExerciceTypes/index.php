<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciceType[]|\Cake\Collection\CollectionInterface $exerciceTypes
 */
?>
<div class="exerciceTypes index content">
    <?= $this->Html->link(__('New Exercice Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Exercice Types') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exerciceTypes as $exerciceType): ?>
                <tr>
                    <td><?= $this->Number->format($exerciceType->id) ?></td>
                    <td><?= h($exerciceType->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $exerciceType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $exerciceType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $exerciceType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exerciceType->id)]) ?>
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
