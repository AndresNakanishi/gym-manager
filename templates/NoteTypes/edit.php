<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NoteType $noteType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $noteType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $noteType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Note Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="noteTypes form content">
            <?= $this->Form->create($noteType) ?>
            <fieldset>
                <legend><?= __('Edit Note Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('level');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
