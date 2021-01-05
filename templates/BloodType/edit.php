<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BloodType $bloodType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bloodType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bloodType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Blood Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bloodType form content">
            <?= $this->Form->create($bloodType) ?>
            <fieldset>
                <legend><?= __('Edit Blood Type') ?></legend>
                <?php
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
