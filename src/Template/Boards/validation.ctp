<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $boards
 */
?>
<div class="boards index large-9 medium-8 columns content">
    <?= $this->Form->create($board, ['url' => ['action' => 'validation']]); ?>
    <fieldset>
      name: <?= $this->Form->text('name'); ?>
            <?= $this->Form->error('name'); ?>
    </fieldset>
    <?= $this->Form->button('送信'); ?>
    <?= $this->Form->end(); ?>
    <h3><?= __('Boards') ?></h3>
</div>
