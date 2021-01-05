<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissionMethod $permissionMethod
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Permission Method'), ['action' => 'edit', $permissionMethod->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Permission Method'), ['action' => 'delete', $permissionMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissionMethod->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Permission Methods'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Permission Method'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="permissionMethods view content">
            <h3><?= h($permissionMethod->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Permission') ?></th>
                    <td><?= $permissionMethod->has('permission') ? $this->Html->link($permissionMethod->permission->name, ['controller' => 'Permissions', 'action' => 'view', $permissionMethod->permission->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Method') ?></th>
                    <td><?= $permissionMethod->has('method') ? $this->Html->link($permissionMethod->method->name, ['controller' => 'Methods', 'action' => 'view', $permissionMethod->method->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($permissionMethod->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
