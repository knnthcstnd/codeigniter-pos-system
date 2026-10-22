<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="page-header page-header-row"><div><h1>Customer Accounts</h1><p>Manage registered POS customers.</p></div><a class="button" href="<?= base_url('customers/new') ?>">Add Customer</a></section>
<div class="table-container"><table><thead><tr><th>Full Name</th><th>Email Address</th><th>Phone Number</th><th>Action</th></tr></thead><tbody>
<?php foreach ($customers as $customer): ?><tr><td><?= esc($customer['full_name']) ?></td><td><?= esc($customer['email']) ?></td><td><?= esc($customer['phone'] ?? '') ?></td><td><a class="text-link" href="<?= base_url('customers/edit/' . $customer['id']) ?>">Edit</a></td></tr><?php endforeach; ?>
</tbody></table></div>
<?= $this->endSection() ?>
