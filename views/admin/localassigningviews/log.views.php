<?php require base_path( 'views/admin/partials/head.php'); ?>
<?php require base_path( 'views/admin/partials/header.php');?>

<main class="h-full overflow-y-auto">
<div class="container px-6 mx-auto grid">
<h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 ">
        <?= $heading ?> 
    </h1>
<table class="w-full whitespace-no-wrap">
    <thead>
        <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Role</th>
            <th class="px-4 py-3">Matricule</th>
            <th class="px-4 py-3">Local</th>
            <th class="px-4 py-3">Action</th>
            <th class="px-4 py-3">Ref(0 is delete)</th>
        </tr>
    </thead>
    <tbody class="text-left bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        <?php foreach ($logs as $log): ?>
        <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3 text-sm">
                <p class="font-semibold">
                    <?= $log['date_update'] ?>
                </p>
            </td>
            <td class="px-4 py-3 text-sm">
                <p class="font-semibold">
                    <?= $log['role_user'] ?>
                </p>
            </td>
            <td class="px-4 py-3 text-sm">
                <p class="font-semibold">
                    <?= $log['mat_user'] ?>
                </p>
            </td>
            <td class="px-4 py-3 text-sm">
                <p class="font-semibold">
                    <?= $log['local_name'] ?>
                </p>
            </td>
            <td class="px-4 py-3 text-sm">
                <p class="font-semibold">
                    <?= $log['typelog'] ?>
                </p>
            </td>
            <td class="px-4 py-3 text-sm">
                <p class="font-semibold">
                    <?= $log['refop'] ?>
                </p>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</main>