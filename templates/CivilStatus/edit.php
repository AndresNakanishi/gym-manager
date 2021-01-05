<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CivilStatus $civilStatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $civilStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $civilStatus->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Civil Status'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="civilStatus form content">
            <?= $this->Form->create($civilStatus) ?>
            <fieldset>
                <legend><?= __('Edit Civil Status') ?></legend>
                <?php
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
