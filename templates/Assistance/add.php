<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assistance $assistance
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Assistance'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assistance form content">
            <?= $this->Form->create($assistance) ?>
            <fieldset>
                <legend><?= __('Add Assistance') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('day', ['empty' => true]);
                    echo $this->Form->control('checkin', ['empty' => true]);
                    echo $this->Form->control('checkout', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
