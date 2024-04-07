<?php require base_path( 'views/admin/partials/head.php'); ?>
<?php require base_path( 'views/admin/partials/header.php') ?>
<?php require base_path( 'views/admin/partials/aside.php')?>




<main class=" p-5 w-full h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid ">
        <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 ">
            <?= $heading ?>
        </h1>
        <!-- Adduser -->
        <div class="px-6 my-6 ">
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="flex items-center justify-between w-60 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple">
                Assign office
                <span class="ml-2" aria-hidden="true">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                    </svg>
                </span>
            </button>
       

      
            <div>
                <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message']): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error_message'] ?>
                </div>
                <?php $_SESSION['error_message'] = null; ?>
                <?php endif; ?>
            </div>


            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 ">Add new equipment to our platform
                            </h3>
                            <form class="space-y-2" action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">


                                <div>
                                    <label for="id_local" class="block mb-2 text-sm font-medium text-gray-900">Select
                                        Local</label>
                                    <select name="id_local"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600"
                                        required>
                                        <option selected disabled>Choose the Local</option>
                                        <!-- Include the list of locals from your PHP data -->
                                        <?php foreach ($offices as $office): ?>
                                        <option value="<?= $office['id_local'] ?>"><?= $office['name'] ?> -
                                            <?= $office['placement'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div>
                                    <label for="mat_user" class="block mb-2 text-sm font-medium text-gray-900">Select
                                        User</label>
                                    <select name="mat_user"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600"
                                        required>
                                        <option selected disabled>Choose the User</option>
                                        <!-- Include the list of users from your PHP data -->
                                        <?php foreach ($users as $user): ?>
                                        <option value="<?= $user['mat_user'] ?>"><?= $user['mat_user'] ?> -
                                            <?= $user['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <button
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /logs modal -->
        </div>


        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">local name</th>
                            <th class="px-4 py-3">Place</th>
                            <th class="px-4 py-3">Agent mat</th>
                            <th class="px-4 py-3">Agent name</th>
                            <th class="px-4 py-3">Agent email</th>
                            <th class="px-4 py-3">Agent tel</th>
                            <th class="px-4 py-3">Action</th>

                        </tr>
                    </thead>

                    <tbody class="text-left bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php $x = 0 ?>
                        <?php foreach ($locals as $local): ?>
                        <?php $x++ ?>
                        <tr class="text-gray-700 dark:text-gray-400">

                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">
                                    <?= $local['office_name'] ?>
                                </p>

                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">
                                    <?= $local['placement'] ?>
                                </p>

                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-bold text-red-700">
                                    <?=  $local['mat_user'] ?>
                                </p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">
                                    <?=  $local['user_name'] ?>
                                </p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">
                                    <?=  $local['email'] ?>
                                </p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">
                                    <?=  $local['telnum'] ?>
                                </p>
                            </td>
                            <td class="px-4 py-3 text-sm">


                                <button data-modal-target="popup-modal<?= $x ?>"
                                    data-modal-toggle="popup-modal<?= $x ?>"
                                    class="block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>

                                </button>
                                <form action="" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="mat_user" value="<?= $local['mat_user'] ?>" readonly>

                                    <input type="hidden" name="id_local" value="<?= $local['id_local'] ?>">
                                    <div id="popup-modal<?= $x ?>" tabindex="-1"
                                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">

                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                    data-modal-hide="popup-modal<?= $x ?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true"
                                                        class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-bold text-gray-500 dark:text-gray-400">
                                                        Are you sure you want
                                                        to unassigne local <?= $local['office_name'] ?> from agent
                                                        <?= $local['user_name'] ?> matricule <?= $local['mat_user'] ?> ?
                                                    </h3>

                                                    <div class="inline-flex items-centertext-center mr-2">
                                                        <button data-modal-hide="popup-modal<?= $x ?>"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5  ">
                                                            Yes, I'm sure
                                                        </button>
                                                    </div>
                                </form>
                                <input data-modal-hide="popup-modal<?= $x ?>" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                    value="No,cancel" />

            </div>
        </div>

    </div>
    </td>
    <?php endforeach; ?>


    </tbody>


    </table>

    </div>
    </div>
    </div>
    <br>
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing <?= count($locals) ?>-<?= count($locals) ?> of <?= count($locals) ?>
        </span>
        <span class="col-span-2"></span>
        <!-- Pagination -->

    </div>
    </div>
    </div>
    </div>

</main>

<?php require base_path('views/admin/partials/foot.php'); ?>