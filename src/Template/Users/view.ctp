<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($user->first_name) ?></p>
            <h6 class="subheader"><?= __('Middle Name') ?></h6>
            <p><?= h($user->middle_name) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= h($user->last_name) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <!-- <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p> -->
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
            <h6 class="subheader"><?= __('Active') ?></h6>
            <p><?= $this->Number->format($user->active) ?></p>
            <h6 class="subheader"><?= __('Created By') ?></h6>
            <p><?= $this->Number->format($user->created_by) ?></p>
            <h6 class="subheader"><?= __('Modified By') ?></h6>
            <p><?= $this->Number->format($user->modified_by) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($user->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Roles') ?></h4>
    <?php if (!empty($user->roles)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Alias') ?></th>
            <th><?= __('Created') ?></th>
            <!-- <th><?= __('Created By') ?></th> -->
            <th><?= __('Modified') ?></th>
            <!-- <th><?= __('Modified By') ?></th> -->
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->roles as $roles): ?>
        <tr>
            <td><?= h($roles->id) ?></td>
            <td><?= h($roles->name) ?></td>
            <td><?= h($roles->alias) ?></td>
            <td><?= h($roles->created) ?></td>
            <!-- <td><?= h($roles->created_by) ?></td> -->
            <td><?= h($roles->modified) ?></td>
            <!-- <td><?= h($roles->modified_by) ?></td> -->

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
