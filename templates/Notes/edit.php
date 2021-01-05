<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Note $note
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $note->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $note->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Notes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="notes form content">
            <?= $this->Form->create($note) ?>
            <fieldset>
                <legend><?= __('Edit Note') ?></legend>
                <?php
                    echo $this->Form->control('note_type_id', ['options' => $noteTypes]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('note');
                    echo $this->Form->control('created_by');
                    echo $this->Form->control('updated_by');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updated_at', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
