<?php
    $this->assign('title', $title);
?>

<h1>En construcción</h1>
<!-- <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Profile') ?></th>
                    <td><?= $user->has('profile') ? $this->Html->link($user->profile->name, ['controller' => 'Profiles', 'action' => 'view', $user->profile->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Routine') ?></th>
                    <td><?= $user->has('routine') ? $this->Html->link($user->routine->name, ['controller' => 'Routines', 'action' => 'view', $user->routine->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Surname') ?></th>
                    <td><?= h($user->surname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dni') ?></th>
                    <td><?= h($user->dni) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mail') ?></th>
                    <td><?= h($user->mail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nationality') ?></th>
                    <td><?= h($user->nationality) ?></td>
                </tr>
                <tr>
                    <th><?= __('Occupation') ?></th>
                    <td><?= h($user->occupation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cellphone') ?></th>
                    <td><?= h($user->cellphone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contact') ?></th>
                    <td><?= h($user->contact) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($user->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Avatar') ?></th>
                    <td><?= h($user->avatar) ?></td>
                </tr>
                <tr>
                    <th><?= __('Civil Status') ?></th>
                    <td><?= $user->has('civil_status') ? $this->Html->link($user->civil_status->description, ['controller' => 'CivilStatus', 'action' => 'view', $user->civil_status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Blood Type') ?></th>
                    <td><?= $user->has('blood_type') ? $this->Html->link($user->blood_type->description, ['controller' => 'BloodType', 'action' => 'view', $user->blood_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sex') ?></th>
                    <td><?= $user->has('sex') ? $this->Html->link($user->sex->description, ['controller' => 'Sex', 'action' => 'view', $user->sex->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $this->Number->format($user->active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cigarretes Per Day') ?></th>
                    <td><?= $this->Number->format($user->cigarretes_per_day) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= $this->Number->format($user->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= $this->Number->format($user->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Recommended By') ?></th>
                    <td><?= $this->Number->format($user->recommended_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Birthday') ?></th>
                    <td><?= h($user->birthday) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($user->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($user->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Smoker') ?></th>
                    <td><?= $user->smoker ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Diabetic') ?></th>
                    <td><?= $user->diabetic ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->note)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Assistance') ?></h4>
                <?php if (!empty($user->assistance)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Day') ?></th>
                            <th><?= __('Checkin') ?></th>
                            <th><?= __('Checkout') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->assistance as $assistance) : ?>
                        <tr>
                            <td><?= h($assistance->id) ?></td>
                            <td><?= h($assistance->user_id) ?></td>
                            <td><?= h($assistance->day) ?></td>
                            <td><?= h($assistance->checkin) ?></td>
                            <td><?= h($assistance->checkout) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Assistance', 'action' => 'view', $assistance->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Assistance', 'action' => 'edit', $assistance->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Assistance', 'action' => 'delete', $assistance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assistance->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Memberships') ?></h4>
                <?php if (!empty($user->memberships)) : ?>
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
                        <?php foreach ($user->memberships as $memberships) : ?>
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
            <div class="related">
                <h4><?= __('Related Notes') ?></h4>
                <?php if (!empty($user->notes)) : ?>
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
                        <?php foreach ($user->notes as $notes) : ?>
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
            <div class="related">
                <h4><?= __('Related Sales') ?></h4>
                <?php if (!empty($user->sales)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Saled By') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th><?= __('Saled At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->sales as $sales) : ?>
                        <tr>
                            <td><?= h($sales->id) ?></td>
                            <td><?= h($sales->product_id) ?></td>
                            <td><?= h($sales->user_id) ?></td>
                            <td><?= h($sales->saled_by) ?></td>
                            <td><?= h($sales->updated_by) ?></td>
                            <td><?= h($sales->active) ?></td>
                            <td><?= h($sales->amount) ?></td>
                            <td><?= h($sales->discount) ?></td>
                            <td><?= h($sales->saled_at) ?></td>
                            <td><?= h($sales->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Sales', 'action' => 'view', $sales->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Sales', 'action' => 'edit', $sales->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sales', 'action' => 'delete', $sales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sales->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Weights') ?></h4>
                <?php if (!empty($user->weights)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Weight') ?></th>
                            <th><?= __('Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->weights as $weights) : ?>
                        <tr>
                            <td><?= h($weights->id) ?></td>
                            <td><?= h($weights->user_id) ?></td>
                            <td><?= h($weights->weight) ?></td>
                            <td><?= h($weights->date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Weights', 'action' => 'view', $weights->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Weights', 'action' => 'edit', $weights->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Weights', 'action' => 'delete', $weights->id], ['confirm' => __('Are you sure you want to delete # {0}?', $weights->id)]) ?>
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
 -->