<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PermissionMethod $permissionMethod
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Permission Methods'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="permissionMethods form content">
            <?= $this->Form->create($permissionMethod) ?>
            <fieldset>
                <legend><?= __('Add Permission Method') ?></legend>
                <?php
                    echo $this->Form->control('permission_id', ['options' => $permissions]);
                    echo $this->Form->control('method_id', ['options' => $methods]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
