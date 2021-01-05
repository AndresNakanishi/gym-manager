<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissionMethod[]|\Cake\Collection\CollectionInterface $permissionMethods
 */
?>
<div class="permissionMethods index content">
    <?= $this->Html->link(__('New Permission Method'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Permission Methods') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('permission_id') ?></th>
                    <th><?= $this->Paginator->sort('method_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permissionMethods as $permissionMethod): ?>
                <tr>
                    <td><?= $this->Number->format($permissionMethod->id) ?></td>
                    <td><?= $permissionMethod->has('permission') ? $this->Html->link($permissionMethod->permission->name, ['controller' => 'Permissions', 'action' => 'view', $permissionMethod->permission->id]) : '' ?></td>
                    <td><?= $permissionMethod->has('method') ? $this->Html->link($permissionMethod->method->name, ['controller' => 'Methods', 'action' => 'view', $permissionMethod->method->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $permissionMethod->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permissionMethod->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permissionMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionMethod->id)]) ?>
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
