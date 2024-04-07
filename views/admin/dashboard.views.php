<?php require base_path('views/admin/partials/head.php'); ?>
<?php require base_path('views/admin/partials/header.php') ?>
<?php require base_path('views/admin/partials/aside.php') ?>

<?php
function getStatusColor($status)
{
    switch ($status) {
        case 'casse':
            return 'bg-red-100 text-red-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'; // Red background for 'casse'
        case 'En panne':
            return 'bg-yellow-100 text-yellow-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300'; // Orange background for 'En panne'
        case 'In Service':
            return 'bg-green-100 text-green-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300'; // Green background for 'In Service'
        case 'nouveau':
            return 'bg-blue-100 text-blue-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300'; // Blue background for 'nouveau'
        case 'En maintenance':
            return 'bg-yellow-100 text-yellow-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300'; // Yellow background for 'En maintenance'
        default:
            return ''; // Default background if status is not recognized
    }
}


function getLogTypeColor($log)
{
    switch ($log) {

    case 'Retirer':
        return 'bg-red-100 text-red-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'; // Red background for 'casse'
    case 'Ajouter':
        return 'bg-green-100 text-green-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300'; // Green background for 'In Service'
;
}
}
?>

<main class="h-full overflow-y-auto">
    <div class="container mx-auto p-6">
        <h1 class="my-6 text-2xl font-semibold text-black">
            <?= $heading ?>
        </h1>

        <!-- Placement filter -->
        <div class="flex-auto">
            <form class="flex items-center" method="POST" action="/dashboard">
                <input type="hidden" name="_method" value="PUT">
                <label for="search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="Search...">
                </div>
                <button type="submit" class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600">
                    <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>
        </div>


        <div class="bg-white shadow-md rounded my-6 ">

            <table class="w-auto border-collapse leading-normal min-w-full">
                <thead>
                    <tr>

                        <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nom Bureau
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Placement
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Matricule Agent
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Nom agent
                        </th>

                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            email

                        </th>
                        <th class="px-2 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            equipments
                        </th>
                        <th class="px-2.5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Historique
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $x = 0; ?>
                    <?php foreach ($offices as $office) : ?>
                        <?php $x++ ?>

                        <tr>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold "><?= $office['office_name'] ?>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold"><?= $office['placement'] ?></td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold"><?= $office['mat_user'] ?></td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold"><?= $office['user_name'] ?></td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm font-bold"><?= $office['email'] ?></td>
                            <td class="px-2 py-2.5 border-b border-gray-200 bg-white text-sm">
                                <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
                                    <!-- Modal toggle -->
                                    <button data-modal-target="large-modal-<?= $office['office_id'] ?>" data-modal-toggle="large-modal-<?= $office['office_id'] ?>" class="block w-2 md:w-auto text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-3 ml-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                        </svg>

                                    </button>
                                    <div id="large-modal-<?= $office['office_id'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-4xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                        Equipment de <?= $office['office_name'] ?>
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="large-modal-<?= $office['office_id'] ?>">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                             

                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 space-y-4">
                                                    <div class="relative bg-white rounded-lg">
                                                        <div class="space-y-4">
                                                            <table class="w-min-full h-40 whitespace-no-wrap w-full">
                                                                <thead>
                                                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                        <th class="px-4 py-3">image</th>
                                                                        <th class="px-4 py-3">Referance</th>
                                                                        <th class="px-4 py-3">nom equipment</th>
                                                                        <th class="px-4 py-3">subcategory</th>
                                                                        <th class="px-4 py-3">Condition</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-left bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                                    <?php foreach ($equipments as $equipment) : ?>

                                                                        <?php if ($equipment['id_local'] == $office['id_local']) : ?>
                                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                                <td class="px-4 py-3 text-sm">
                                                                                    <img class=" object-cover w-4/6 rounded-lg" src="<?= $equipment['image'] ?>" alt="" loading="lazy" />
                                                                                </td>
                                                                                <td class="px-4 py-3 text-sm">
                                                                                    <p class="font-semibold">
                                                                                        <?= $equipment['ref'] ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td class="px-4 py-3 text-sm">
                                                                                    <p class="font-semibold">
                                                                                        <?= $equipment['equipment_name'] ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td class="px-4 py-3 text-sm">
                                                                                    <p class="font-semibold">
                                                                                        <?= $equipment['subcategory'] ?>
                                                                                    </p>
                                                                                </td>
                                                                                <td class="px-4 py-3 text-sm">
                                                                                    <p class="font-bold <?= getStatusColor($equipment['status']) ?>">
                                                                                        <?= $equipment['status'] ?>
                                                                                    </p>
                                                                            </tr>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <button data-modal-hide="large-modal-<?= $office['office_id'] ?>" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Ok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                            <td class="px-2 py-2.5 border-b border-gray-200 bg-white text-sm">
                                <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
                                    <p class="font-semibold">
                                        <button data-modal-target="extralarge-modal-<?= $office['office_id'] ?>" data-modal-toggle="extralarge-modal-<?= $office['office_id'] ?>" class="block w-2 md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-3 ml-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                            </svg>

                                        </button>
                                    </p>

                                </div>
                                <div id="extralarge-modal-<?= $office['office_id'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-7xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                    L'Histoire de <?= $office['office_name'] ?>
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal-<?= $office['office_id'] ?>">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div class="p-6 text-center">
                                                   
                                                    <!--  -->
                                                    <table class="w-full whitespace-no-wrap">
                                                        <thead>
                                                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                                <th class="px-4 py-3">Date</th>
                                                                <th class="px-4 py-3">Role</th>
                                                                <th class="px-4 py-3">Matricule</th>
                                                                <th class="px-4 py-3">Name</th>
                                                                <th class="px-4 py-3">Local</th>
                                                                <th class="px-4 py-3">Place</th>
                                                                <th class="px-4 py-3">Equipment</th>
                                                                <th class="px-4 py-3">Referance</th>
                                                                <th class="px-4 py-3">type de log</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-left bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                                            <?php foreach ($logs as $officeLogs) : ?>
                                                                <?php if ($officeLogs['id_local'] == $office['office_id']) :  ?>
                                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                                        <td class="px-4 py-3 text-sm">
                                                                            <p class="font-semibold">
                                                                                <?= $officeLogs['date_update'] ?>
                                                                            </p>
                                                                        </td>
                                                                        <td class="px-4 py-3 text-sm">
                                                                            <p class="font-semibold">
                                                                                <?= $officeLogs['role_user'] ?>
                                                                            </p>
                                                                        </td>
                                                                        <td class="px-4 py-3 text-sm">
                                                                            <p class="font-semibold">
                                                                                <?= $officeLogs['mat_user'] ?>
                                                                            </p>
                                                                        </td>
                                                                        <td class="px-4 py-3 text-sm">
                                                                            <p class="font-semibold">
                                                                                <?= $officeLogs['user_name'] ?>
                                                                            </p>
                                                                        <td class="px-4 py-3 text-sm">
                                                                            <p class="font-semibold">
                                                                                <?= $officeLogs['local_name'] ?>
                                                                            </p>
                                                                        </td>
                                                                        <td class="px-4 py-3 text-sm">
                                                                            <p class="font-semibold">
                                                                                <?= $officeLogs['placement'] ?>
                                                                            </p>
                                                                        </td>
                                                                        <td class="px-4 py-3 text-sm">
                                                                            <p class="font-semibold">
                                                                                <?= $officeLogs['ref_equipment'] ?>
                                                                            </p>
                                                                        </td>
                                                                        <td class="px-4 py-3 text-sm">
                                                                            <p class="font-semibold">
                                                                                <?= $officeLogs['equipment_name'] ?>
                                                                            </p>
                                                                        </td>
                                                                        <td class="px-4 py-3 text-sm">
                                                                            <p class="font-bold <?= getLogTypeColor($officeLogs['typelog']) ?>">
                                                                                    <?= $officeLogs['typelog'] ?>

                                                                            </p>
                                                                        </td>
                                                                    </tr>

                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <button data-modal-hide="extralarge-modal-<?= $office['office_id'] ?>" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Sortir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <div>
        <footer class="pt-10 w-screen">
            <?php require base_path('views/admin/partials/foot.php') ?>
        </footer>

    </div>
</main>