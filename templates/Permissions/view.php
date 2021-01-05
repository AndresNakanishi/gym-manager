<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Permission'), ['action' => 'edit', $permission->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Permission'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Permissions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Permission'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="permissions view content">
            <h3><?= h($permission->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $permission->has('level') ? $this->Html->link($permission->level->id, ['controller' => 'Levels', 'action' => 'view', $permission->level->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($permission->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($permission->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Permission Methods') ?></h4>
                <?php if (!empty($permission->permission_methods)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Permission Id') ?></th>
                            <th><?= __('Method Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($permission->permission_methods as $permissionMethods) : ?>
                        <tr>
                            <td><?= h($permissionMethods->id) ?></td>
                            <td><?= h($permissionMethods->permission_id) ?></td>
                            <td><?= h($permissionMethods->method_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PermissionMethods', 'action' => 'view', $permissionMethods->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PermissionMethods', 'action' => 'edit', $permissionMethods->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PermissionMethods', 'action' => 'delete', $permissionMethods->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionMethods->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
