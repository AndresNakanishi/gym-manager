<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExerciceType $exerciceType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Exercice Type'), ['action' => 'edit', $exerciceType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Exercice Type'), ['action' => 'delete', $exerciceType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exerciceType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Exercice Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Exercice Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="exerciceTypes view content">
            <h3><?= h($exerciceType->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($exerciceType->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($exerciceType->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Exercices') ?></h4>
                <?php if (!empty($exerciceType->exercices)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Exercice Type Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($exerciceType->exercices as $exercices) : ?>
                        <tr>
                            <td><?= h($exercices->id) ?></td>
                            <td><?= h($exercices->exercice_type_id) ?></td>
                            <td><?= h($exercices->name) ?></td>
                            <td><?= h($exercices->image) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Exercices', 'action' => 'view', $exercices->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Exercices', 'action' => 'edit', $exercices->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exercices', 'action' => 'delete', $exercices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercices->id)]) ?>
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
