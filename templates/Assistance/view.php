<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assistance $assistance
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Assistance'), ['action' => 'edit', $assistance->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Assistance'), ['action' => 'delete', $assistance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assistance->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Assistance'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Assistance'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assistance view content">
            <h3><?= h($assistance->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $assistance->has('user') ? $this->Html->link($assistance->user->name, ['controller' => 'Users', 'action' => 'view', $assistance->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($assistance->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Day') ?></th>
                    <td><?= h($assistance->day) ?></td>
                </tr>
                <tr>
                    <th><?= __('Checkin') ?></th>
                    <td><?= h($assistance->checkin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Checkout') ?></th>
                    <td><?= h($assistance->checkout) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
