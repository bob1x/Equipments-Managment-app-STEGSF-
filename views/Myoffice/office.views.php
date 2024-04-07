<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<?php
function selectedOption($value, $currentValue)
{
    $selected = ($currentValue == $value) ? 'selected' : '';
    return "<option value=\"$value\" $selected>$value</option>";
}
?>

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




        <br>
        <div class="flex place-items-end">
            <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Generate PDF
            </button>



            <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Immo Fichier
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-4 md:p-5 space-y-4">
                            <form action="" method="POST">
                                <input type="hidden" name="_method" value="PDF">
                                <label for="office" class="text-lg font-semibold text-gray-500 uppercase dark:text-gray-400">
                                    Quel bureau voulez-vous générer le fichier PDF?
                                </label>
                                <select name="id_local" id="office" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    <?php foreach ($offices as $office) : ?>
                                        <option value="<?= $office['id_local'] ?>"><?= $office['office_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit" id="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Générer
                                </button>
                            </form>

                        </div>
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                            <button data-modal-hide="static-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Exit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>

                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Office Name</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Placement
                        </th>

                        <th class="  border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Ajouter des equipements
                        </th>
                        <th class=" border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Equipments de Bureau
                        </th>
                        <th class="px-1 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Historique
                        </th>



                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($offices as $office) : ?>

                        <tr>
                            <td class="px-5 py-5 border-b text-bold border-gray-200 bg-white text-sm uppercase">
                                <?= $office['office_name'] ?>
                            </td>
                            <td class="px-5 py-5 border-b text-bold border-gray-200 bg-white text-sm uppercase">
                                <?= $office['placement'] ?></td>
                            <!-- equipments action -->
                            <td class="px-2.5 py-3 border-b border-gray-200 bg-white text-sm">
                                <div class="block justify-center rtl:space-x-reverse">
                                    <!-- Modal toggle -->
                                    <button data-modal-target="large-modal-<?= $office['id_local'] ?>" data-modal-toggle="large-modal-<?= $office['id_local'] ?>" class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                    <!-- add a svg for all of the modals -->
                                    <div id="large-modal-<?= $office['id_local'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-4xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h5 class="text-lg font-semibold text-gray-500 uppercase dark:text-gray-400">
                                                        Ajouter des equipements</h5>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="large-modal-<?= $office['id_local'] ?>">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 space-y-4">
                                                    <?php foreach ($equipments as $equipment) : ?>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="_method" value="STORE">
                                                            <input type="hidden" name="id_local" value="<?= $office['id_local'] ?>">
                                                            <input type="hidden" name="id_equipment" value="<?= $equipment['id_equipment'] ?>">
                                                            <table class="min-w-full leading-normal flex-row border border-gray-300 bg-white rounded-md shadow-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <label for="equipment" class="block text-sm font-medium text-gray-700">Equipment
                                                                        </label>
                                                                        <th class="px-5 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                                            Name
                                                                        </th>
                                                                        <th class="px-5 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                                            Description
                                                                        </th>
                                                                        <th class="px-5 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                                            Image
                                                                        </th>
                                                                        <th class="px-5 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                                            Ajouter
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                                                            <?= $equipment['name'] ?>
                                                                        </td>
                                                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                                                            <?= $equipment['description'] ?>
                                                                        </td>
                                                                        <td class="h-56 w-56 self-center px-5 py-5 border-b border-gray-200 text-sm">
                                                                            <img src="<?= $equipment['image'] ?>" alt="eqimg">
                                                                        </td>
                                                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                                                            <button type="submit" name="action" value="submit-<?= $equipment['id_equipment'] ?>" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                                                </svg>

                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    <?php endforeach; ?>

                                                </div>
                                                <!-- Modal footer -->
                                                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <button data-modal-hide="large-modal-<?= $office['id_local'] ?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Ok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </td>
                            <!-- drawer -->
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

                                <div class="text-left">
                                    <button class="text-white bg-red-600 hover:bg-red-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-form-<?= $office['id_local'] ?>" data-drawer-show="drawer-form-<?= $office['id_local'] ?>" aria-controls="drawer-form-<?= $office['id_local'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </button>
                                </div>
                                <div id="drawer-form-<?= $office['id_local'] ?>" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-100 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-form-label">
                                    <h5 id="drawer-label" class="inline-flex items-center mb-6 text-base font-bold text-gray-500 uppercase dark:text-gray-400">
                                        Equipments de <?= $office['office_name'] ?>
                                    </h5>
                                    <button type="button" data-drawer-hide="drawer-form-<?= $office['id_local'] ?>" aria-controls="drawer-form-<?= $office['id_local'] ?>" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close menu</span>
                                    </button>



                                    <table class="w-full whitespace-no-wrap">
                                        <thead>
                                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th class="px-4 py-3">image</th>
                                                <th class="px-4 py-3">Referance</th>
                                                <th class="px-4 py-3">nom equipment</th>
                                                <th class="px-4 py-3">subcategory</th>
                                                <th class="px-4 py-3">status</th>
                                                <th class="px-4 py-3">Retirer</th>
                                                <th class="px-4 py-3">mise a jour condition</th>

                                            </tr>
                                        </thead>
                                        <tbody class="text-left bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            <?php $x = 0  ?>
                                            <?php foreach ($equipmentoffices as $equipmentoffice) : ?>
                                                <?php $x++ ?>
                                                <?php if ($equipmentoffice['id_local'] == $office['id_local']) : ?>
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3 text-sm ">
                                                            <img class=" object-cover w-56 rounded-lg" src="<?= $equipmentoffice['image'] ?>" alt="" loading="lazy" />
                                                        </td>
                                                        <td class="px-4 py-3 text-sm uppercase">
                                                            <p class="font-bold">
                                                                <?= $equipmentoffice['ref'] ?>
                                                            </p>
                                                        </td>
                                                        <td class="px-4 py-3 text-sm uppercase">
                                                            <p class="font-bold">
                                                                <?= $equipmentoffice['equipment_name'] ?>
                                                            </p>
                                                        </td>
                                                        <td class="px-4 py-3 text-sm uppercase">
                                                            <p class="font-bold">
                                                                <?= $equipmentoffice['subcategory'] ?>
                                                            </p>
                                                        </td>
                                                        <td class="px-4 py-3 text-sm uppercase">
                                                            <p class="font-bold <?= getStatusColor($equipmentoffice['status']) ?>">
                                                                <?= $equipmentoffice['status'] ?>
                                                            </p>
                                                        </td>
                                                        <td class="px-4 py-3 text-sm">
                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="id_equipment" value="<?= $equipmentoffice['id_equipment'] ?>">
                                                                <input type="hidden" name="id_local" value="<?= $office['id_local'] ?>">

                                                                <button type="submit" class="text-white justify-center flex items-center bg-red-700 hover:bg-red-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                    </svg>

                                                                </button>
                                                            </form>

                                                        </td>
                                                        <td class="px-4 py-3 text-sm">

                                                            <!-- modal here for status  -->

                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="_method" value="PATCH">
                                                                <input type="hidden" name="id_equipment" value="<?= $equipmentoffice['id_equipment'] ?>">
                                                                <input type="hidden" name="id_local" value="<?= $office['id_local'] ?>">
                                                                <input type="hidden" name="unique_id" value="<?= $equipmentoffice['unique_id'] ?>">
                                                                <input type="hidden" name="old_status" value="<?= $equipmentoffice['status'] ?>">

                                                                <!-- selection here -->

                                                                <select type="submit" id="status" name="status" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                                    <?= selectedOption('nouveau', $currentStatus) ?>
                                                                    <?= selectedOption('In Service', $currentStatus) ?>
                                                                    <?= selectedOption('En maintenance', $currentStatus) ?>
                                                                    <?= selectedOption('En panne', $currentStatus) ?>
                                                                    <?= selectedOption('casse', $currentStatus) ?>
                                                                </select>
                                                                <button type="submit" id="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                    Modifier
                                                                </button>




                                                            </form>


                                </div>
        </div>
    </div>
    </td>
    </tr>
<?php endif; ?>
<?php endforeach; ?>
</tbody>
</table>
</td>

<!-- history -->
<td class="px-2 py-2.5 border-b border-gray-200 bg-white text-sm">
    <div class="block space-y-4 md:flex md:space-y-0 md:space-x-4 rtl:space-x-reverse">
        <p class="font-semibold">
            <button data-modal-target="extralarge-modal-<?= $office['id_local'] ?>" data-modal-toggle="extralarge-modal-<?= $office['id_local'] ?>" class="block w-2 md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 px-3 ml-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                </svg>

            </button>
        </p>

    </div>
    <div id="extralarge-modal-<?= $office['id_local'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        L'Histoire de <?= $office['office_name'] ?>
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal-<?= $office['id_local'] ?>">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <!-- filter -->



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
                                    <?php if ($officeLogs['id_local'] == $office['id_local']) :  ?>



                    </div>
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
                    <button data-modal-hide="extralarge-modal-<?= $office['id_local'] ?>" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Sortir</button>
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

</main>