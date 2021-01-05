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
            <?= $this->Html->link(__('List Memberships'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="memberships form content">
            <?= $this->Form->create($membership) ?>
            <fieldset>
                <legend><?= __('Add Membership') ?></legend>
                <?php
                    echo $this->Form->control('membership_type_id', ['options' => $membershipTypes]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('valid_from');
                    echo $this->Form->control('valid_to');
                    echo $this->Form->control('note');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
