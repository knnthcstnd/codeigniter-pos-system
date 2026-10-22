<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="hero">
    <h1><?= esc($heading) ?></h1>

    <p>
        Manage customer and staff account information through a simple,
        organized Point-of-Sale website.
    </p>

    <div class="actions">
        <a class="button" href="<?= base_url('customers') ?>">
            View Customers
        </a>

        <a class="button secondary" href="<?= base_url('users') ?>">
            View Users
        </a>
    </div>
</section>

<?= $this->endSection() ?>