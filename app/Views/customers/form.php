<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<section class="page-header"><h1><?= esc($heading) ?></h1><p>Complete the required customer information.</p></section>
<?php if ($errors): ?><div class="alert error"><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form class="form-card" action="<?= esc($action) ?>" method="post">
<?= csrf_field() ?>
<label for="full_name">Full Name <span>*</span></label><input id="full_name" name="full_name" value="<?= old('full_name', $customer['full_name'] ?? '') ?>" required>
<label for="email">Email Address <span>*</span></label><input id="email" type="email" name="email" value="<?= old('email', $customer['email'] ?? '') ?>" required>
<label for="phone">Phone Number</label><input id="phone" name="phone" value="<?= old('phone', $customer['phone'] ?? '') ?>">
<div class="form-actions"><a class="button secondary" href="<?= base_url('customers') ?>">Cancel</a><button class="button" type="submit">Save Customer</button></div>
</form>
<?= $this->endSection() ?>
