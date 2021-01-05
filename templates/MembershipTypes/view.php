<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MembershipType $membershipType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Membership Type'), ['action' => 'edit', $membershipType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Membership Type'), ['action' => 'delete', $membershipType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membershipType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Membership Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Membership Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="membershipTypes view content">
            <h3><?= h($membershipType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($membershipType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($membershipType->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Memberships') ?></h4>
                <?php if (!empty($membershipType->memberships)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Membership Type Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Valid From') ?></th>
                            <th><?= __('Valid To') ?></th>
                            <th><?= __('Note') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($membershipType->memberships as $memberships) : ?>
                        <tr>
                            <td><?= h($memberships->id) ?></td>
                            <td><?= h($memberships->membership_type_id) ?></td>
                            <td><?= h($memberships->user_id) ?></td>
                            <td><?= h($memberships->valid_from) ?></td>
                            <td><?= h($memberships->valid_to) ?></td>
                            <td><?= h($memberships->note) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Memberships', 'action' => 'view', $memberships->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Memberships', 'action' => 'edit', $memberships->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Memberships', 'action' => 'delete', $memberships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberships->id)]) ?>
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
