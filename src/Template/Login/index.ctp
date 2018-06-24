<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="form large-9 medium-8 columns content">
    <?= $this->Form->create($user, ['url' => ['controller' => 'login', 'action' => 'login']]) ?>
    <fieldset>
        <legend><?= __('Login') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Login')) ?>
    <?= $this->Form->end() ?>
</div>
