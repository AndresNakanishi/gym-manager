<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Method $method
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Methods'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="methods form content">
            <?= $this->Form->create($method) ?>
            <fieldset>
                <legend><?= __('Add Method') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('controller_name');
                    echo $this->Form->control('action_name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
