<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rep $rep
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Rep'), ['action' => 'edit', $rep->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Rep'), ['action' => 'delete', $rep->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rep->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Rep'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reps view content">
            <h3><?= h($rep->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Exercice') ?></th>
                    <td><?= $rep->has('exercice') ? $this->Html->link($rep->exercice->name, ['controller' => 'Exercices', 'action' => 'view', $rep->exercice->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($rep->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Series') ?></th>
                    <td><?= $this->Number->format($rep->series) ?></td>
                </tr>
                <tr>
                    <th><?= __('Repetition') ?></th>
                    <td><?= $this->Number->format($rep->repetition) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $this->Number->format($rep->order) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Routine Days') ?></h4>
                <?php if (!empty($rep->routine_days)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($rep->routine_days as $routineDays) : ?>
                        <tr>
                            <td><?= h($routineDays->id) ?></td>
                            <td><?= h($routineDays->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RoutineDays', 'action' => 'view', $routineDays->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RoutineDays', 'action' => 'edit', $routineDays->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RoutineDays', 'action' => 'delete', $routineDays->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routineDays->id)]) ?>
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
