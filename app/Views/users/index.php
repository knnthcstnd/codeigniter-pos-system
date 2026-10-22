<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="page-header page-header-row"><div><h1>User Accounts</h1><p>Manage staff members authorized to use the POS system.</p></div><a class="button" href="<?= base_url('users/new') ?>">Add User</a></section>
<div class="table-container"><table><thead><tr><th>Avatar</th><th>Username</th><th>Full Name</th><th>Role</th><th>Action</th></tr></thead><tbody>
<?php foreach ($users as $user): ?><?php $avatar = ! empty($user['avatar']) ? base_url('uploads/avatars/' . $user['avatar']) : base_url('images/placeholder.svg'); ?><tr><td><img class="avatar" src="<?= esc($avatar) ?>" alt="Avatar of <?= esc($user['full_name']) ?>"></td><td><?= esc($user['username']) ?></td><td><?= esc($user['full_name']) ?></td><td><?= esc($user['role'] ?? '') ?></td><td><a class="text-link" href="<?= base_url('users/edit/' . $user['id']) ?>">Edit</a></td></tr><?php endforeach; ?>
</tbody></table></div>
<?= $this->endSection() ?>
