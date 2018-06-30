<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $boards
 */
?>
<div class="boards index large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['url' => ['action' => 'index']]); ?>
    <fieldset>
       id: <?= $this->Form->text('input'); ?>
    </fieldset>
    <?= $this->Form->button('送信'); ?>
    <?= $this->Form->end(); ?>
    <h3><?= __('Boards') ?></h3>
    <!-- <pre>
        <?php print_r($boards)?>
    </pre> 
    <p><?= $sql ?></p>
    <p>count: <?= $count ?></p>-->
    <table>
        <?php foreach ($boards as $board): ?>
            <tr>
                <td><?= $board['id'] . ':' . $board['name'] . ':' . $board['title'] ?></td>
            </tr>        
        <?php endforeach ?>
    </table>
</div>
