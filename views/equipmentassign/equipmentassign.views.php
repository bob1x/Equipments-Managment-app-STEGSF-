<?php require ('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<main class="h-full overflow-y-auto">
    <div class="container mx-auto p-6">
        <h1 class="my-6 text-2xl font-semibold text-black">
            <?= $heading ?>
        </h1>

        <!-- Placement filter -->
        <form class="space-y-2" action="/offices" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <label for="placement" class="mr-2">Select Placement:</label>
            <select name="placement" id="placement" class="border p-2 rounded">
                <option value="">All</option>
                <?php foreach ($distinctPlacements as $placement): ?>
                <option value="<?= $placement['placement'] ?>"><?= $placement['placement'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Filter</button>
        </form>

        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Office Name</th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Location</th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Access Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($offices as $office): ?>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?= $office['office_name'] ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?= $office['placement'] ?></td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm"><?= $office['id_local'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<div></div>