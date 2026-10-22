<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<section class="page-header"><h1><?= esc($heading) ?></h1><p>Username and full name are required.</p></section>
<?php if ($errors): ?><div class="alert error"><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form class="form-card" action="<?= esc($action) ?>" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
<label for="username">Username <span>*</span></label><input id="username" name="username" value="<?= old('username', $user['username'] ?? '') ?>" required>
<label for="full_name">Full Name <span>*</span></label><input id="full_name" name="full_name" value="<?= old('full_name', $user['full_name'] ?? '') ?>" required>
<label for="role">Role</label><input id="role" name="role" value="<?= old('role', $user['role'] ?? 'Cashier') ?>">
<label for="avatar">Profile Picture <small>JPG or PNG, maximum 2 MB</small></label><input id="avatar" type="file" name="avatar" accept="image/jpeg,image/png">
<?php if (! empty($user['avatar'])): ?><p class="current-avatar">Current picture: <?= esc($user['avatar']) ?></p><?php endif; ?>
<div class="form-actions"><a class="button secondary" href="<?= base_url('users') ?>">Cancel</a><button class="button" type="submit">Save User</button></div>
</form>
<?= $this->endSection() ?>
