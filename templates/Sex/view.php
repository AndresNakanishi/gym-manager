<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sex $sex
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sex'), ['action' => 'edit', $sex->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sex'), ['action' => 'delete', $sex->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sex->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sex'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sex'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sex view content">
            <h3><?= h($sex->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($sex->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sex->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($sex->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Profile Id') ?></th>
                            <th><?= __('Routine Id') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Surname') ?></th>
                            <th><?= __('Dni') ?></th>
                            <th><?= __('Mail') ?></th>
                            <th><?= __('Birthday') ?></th>
                            <th><?= __('Nationality') ?></th>
                            <th><?= __('Occupation') ?></th>
                            <th><?= __('Cellphone') ?></th>
                            <th><?= __('Contact') ?></th>
                            <th><?= __('Address') ?></th>
                            <th><?= __('Avatar') ?></th>
                            <th><?= __('Smoker') ?></th>
                            <th><?= __('Cigarretes Per Day') ?></th>
                            <th><?= __('Diabetic') ?></th>
                            <th><?= __('Civil Status Id') ?></th>
                            <th><?= __('Blood Type Id') ?></th>
                            <th><?= __('Sex Id') ?></th>
                            <th><?= __('Note') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Recommended By') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sex->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->profile_id) ?></td>
                            <td><?= h($users->routine_id) ?></td>
                            <td><?= h($users->active) ?></td>
                            <td><?= h($users->name) ?></td>
                            <td><?= h($users->surname) ?></td>
                            <td><?= h($users->dni) ?></td>
                            <td><?= h($users->mail) ?></td>
                            <td><?= h($users->birthday) ?></td>
                            <td><?= h($users->nationality) ?></td>
                            <td><?= h($users->occupation) ?></td>
                            <td><?= h($users->cellphone) ?></td>
                            <td><?= h($users->contact) ?></td>
                            <td><?= h($users->address) ?></td>
                            <td><?= h($users->avatar) ?></td>
                            <td><?= h($users->smoker) ?></td>
                            <td><?= h($users->cigarretes_per_day) ?></td>
                            <td><?= h($users->diabetic) ?></td>
                            <td><?= h($users->civil_status_id) ?></td>
                            <td><?= h($users->blood_type_id) ?></td>
                            <td><?= h($users->sex_id) ?></td>
                            <td><?= h($users->note) ?></td>
                            <td><?= h($users->created_at) ?></td>
                            <td><?= h($users->updated_at) ?></td>
                            <td><?= h($users->created_by) ?></td>
                            <td><?= h($users->updated_by) ?></td>
                            <td><?= h($users->recommended_by) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
