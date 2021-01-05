<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RoutineDay $routineDay
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Routine Day'), ['action' => 'edit', $routineDay->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Routine Day'), ['action' => 'delete', $routineDay->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routineDay->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Routine Days'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Routine Day'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="routineDays view content">
            <h3><?= h($routineDay->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($routineDay->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($routineDay->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Reps') ?></h4>
                <?php if (!empty($routineDay->reps)) : ?>
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
                        <?php foreach ($routineDay->reps as $reps) : ?>
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
            <div class="related">
                <h4><?= __('Related Routines') ?></h4>
                <?php if (!empty($routineDay->routines)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($routineDay->routines as $routines) : ?>
                        <tr>
                            <td><?= h($routines->id) ?></td>
                            <td><?= h($routines->name) ?></td>
                            <td><?= h($routines->description) ?></td>
                            <td><?= h($routines->created_by) ?></td>
                            <td><?= h($routines->created_at) ?></td>
                            <td><?= h($routines->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Routines', 'action' => 'view', $routines->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Routines', 'action' => 'edit', $routines->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Routines', 'action' => 'delete', $routines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routines->id)]) ?>
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
