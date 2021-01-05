<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NoteType $noteType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Note Type'), ['action' => 'edit', $noteType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Note Type'), ['action' => 'delete', $noteType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $noteType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Note Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Note Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="noteTypes view content">
            <h3><?= h($noteType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($noteType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($noteType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Level') ?></th>
                    <td><?= $this->Number->format($noteType->level) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Notes') ?></h4>
                <?php if (!empty($noteType->notes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Note Type Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Note') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($noteType->notes as $notes) : ?>
                        <tr>
                            <td><?= h($notes->id) ?></td>
                            <td><?= h($notes->note_type_id) ?></td>
                            <td><?= h($notes->user_id) ?></td>
                            <td><?= h($notes->note) ?></td>
                            <td><?= h($notes->created_by) ?></td>
                            <td><?= h($notes->updated_by) ?></td>
                            <td><?= h($notes->created_at) ?></td>
                            <td><?= h($notes->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Notes', 'action' => 'view', $notes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Notes', 'action' => 'edit', $notes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notes', 'action' => 'delete', $notes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notes->id)]) ?>
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
