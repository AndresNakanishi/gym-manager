<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Membership'), ['action' => 'edit', $membership->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Membership'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Memberships'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Membership'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="memberships view content">
            <h3><?= h($membership->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Membership Type') ?></th>
                    <td><?= $membership->has('membership_type') ? $this->Html->link($membership->membership_type->name, ['controller' => 'MembershipTypes', 'action' => 'view', $membership->membership_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $membership->has('user') ? $this->Html->link($membership->user->name, ['controller' => 'Users', 'action' => 'view', $membership->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($membership->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valid From') ?></th>
                    <td><?= h($membership->valid_from) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valid To') ?></th>
                    <td><?= h($membership->valid_to) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($membership->note)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
