<?php $this->assign('title', __('Login')); ?>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Welcome') ?></h3>
    <ul class="side-nav">
        <li><?= __('Please enter your email and password to login.') ?></li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create('users'); ?>
    <fieldset>
        <legend><?= __('Login') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Login')) ?>
    <?= $this->Form->end() ?>
</div>