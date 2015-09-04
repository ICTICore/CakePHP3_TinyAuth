    <?= $this->Form->create(); ?>
    <fieldset>
        <legend><?= __('Search') ?></legend>
        <?php
            echo $this->Form->input('search', ['label' => false, 'placeholder' => __('Search')]);
        ?>
        <?= $this->Form->button(__('Search')) ?>
    </fieldset>
    <?= $this->Form->end() ?>