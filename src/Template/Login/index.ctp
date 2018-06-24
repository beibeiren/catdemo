<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="form large-9 medium-8 columns content">
    <?= $this->Form->create(null,[]) ?>
    <fieldset>
        <legend><?= __('Login') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Login')) ?>
    <?= $this->Form->end() ?>
</div>
