<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Weight $weight
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Weight'), ['action' => 'edit', $weight->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Weight'), ['action' => 'delete', $weight->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weight->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Weights'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Weight'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="weights view content">
            <h3><?= h($weight->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $weight->has('user') ? $this->Html->link($weight->user->name, ['controller' => 'Users', 'action' => 'view', $weight->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($weight->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Weight') ?></th>
                    <td><?= $this->Number->format($weight->weight) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($weight->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
