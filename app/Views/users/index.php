<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-header">
    <h1>User Accounts</h1>
    <p>List of staff members authorized to use the POS system.</p>
</section>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>