<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercice $exercice
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exercice'), ['action' => 'edit', $exercice->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exercice'), ['action' => 'delete', $exercice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercice->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exercices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exercice'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exercices view content">
            <h3><?= h($exercice->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Exercice Type') ?></th>
                    <td><?= $exercice->has('exercice_type') ? $this->Html->link($exercice->exercice_type->name, ['controller' => 'ExerciceTypes', 'action' => 'view', $exercice->exercice_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($exercice->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($exercice->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($exercice->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Reps') ?></h4>
                <?php if (!empty($exercice->reps)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exercice Id') ?></th>
                            <th><?= __('Series') ?></th>
                            <th><?= __('Repetition') ?></th>
                            <th><?= __('Order') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exercice->reps as $reps) : ?>
                        <tr>
                            <td><?= h($reps->id) ?></td>
                            <td><?= h($reps->exercice_id) ?></td>
                            <td><?= h($reps->series) ?></td>
                            <td><?= h($reps->repetition) ?></td>
                            <td><?= h($reps->order) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reps', 'action' => 'view', $reps->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reps', 'action' => 'edit', $reps->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reps', 'action' => 'delete', $reps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reps->id)]) ?>
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
