<?php require base_path('views/admin/partials/head.php'); ?>
<?php require base_path('views/admin/partials/header.php') ?>
<?php require base_path('views/admin/partials/aside.php') ?>

<?php
function selectedOption($value, $currentRole)
{
    $selected = ($currentRole == $value) ? 'selected' : '';
    return "<option value=\"$value\" $selected>$value</option>";
}

function getRoleColor($role)
{
    switch ($role) {
        case 'admin':
            return 'bg-red-100 text-red-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'; // Red background for 'casse'
        case 'user':
            return 'bg-blue-100 text-blue-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300'; // Orange background for 'En panne'
        default:
            return 'bg-green-100 text-green-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300'; // Green background for 'Fonctionnel'
    }
}

?>

<main class=" p-5 w-full h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid ">
        <h1 class="my-6 text-2xl font-semibold text-black-700 dark:text-gray-200 ">
            <?= $heading ?>
        </h1>
        <?php if ($_SESSION['error_message']) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error_message'] ?>
            </div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
        <!-- Adduser -->
        <div class="px-6 my-6 ">
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="flex items-center justify-between w-60 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-700 border border-transparent rounded-lg active:bg-green-800 hover:bg-green-800 focus:outline-none focus:shadow-outline-purple">
                Ajout Agent
                <span class="ml-2" aria-hidden="true">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                    </svg>
                </span>
            </button>

            <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 ">Ajout Agent
                            </h3>
                            <form class="space-y-2" action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <div>
                                    <label for="mat_user" class="block mb-2 text-sm font-medium text-gray-900 ">Matricule</label>
                                    <input type="mat_user" name="mat_user" id="mat_user" value="<?= isset($oldInput['mat_user']) ? $oldInput['mat_user'] : '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600" placeholder="matricule" required>
                                    <?php if (isset($errors['mat_user'])) : ?>
                                        <div class="text-orange-600"><?= $errors['mat_user']; ?></div>
                                    <?php endif; ?>

                                </div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Choisir une
                                    Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600" placeholder="Email" required>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600" placeholder="Nom" required>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-600" required>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600" placeholder="Password" required>
                                <label for="TelNum" class="block mb-2 text-sm font-medium text-gray-900">Telephone
                                    Number</label>
                                <input type="tel" name="TelNum" id="TelNum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600" placeholder="Telephone Number" required>

                                <label for="Fonction" class="block mb-2 text-sm font-medium text-gray-900">Fonction</label>
                                <input type="tel" name="Fonction" id="Fonction" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600" placeholder="Fonction" required>
                                <div class="border border-t-2 border-t-black"></div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th>Matricule</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone Number</th>
                            <th>role</th>
                            <th>Fonction</th>
                            <th>Supprimer</th>
                            <th>Mise a jour</th>
                        </tr>
                    </thead>
                    <tbody class="text-left bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php foreach ($users as $user) : ?>

                            <tr>
                                <td class="px-4 py-3 text-sm">
                                    <p class="font-semibold">
                                        <?= $user['mat_user']; ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <p class="font-semibold"><?= $user['name']; ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <p class="font-semibold">
                                        <?= $user['email']; ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <p class="font-semibold">
                                        <?= $user['telnum']; ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <p class="font-semibold <?= getRoleColor($user['role']) ?>">
                                        <?= $user['role']; ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <p class="font-semibold">
                                        <?= $user['Fonction']; ?>
                                </td>
                                <td class="px-4 py-3 text-sm">


                                    <button data-modal-target="popup-modal-<?= $user['id_user'] ?>" data-modal-toggle="popup-modal-<?= $user['id_user'] ?>" class="block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>

                                    <form action="" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                        <div id="popup-modal-<?= $user['id_user'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">

                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal-<?= $user['id_user'] ?>">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-6 text-center">
                                                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                            Are you sure you want
                                                            to delete this Agent ?</h3>

                                                        <div class="inline-flex items-centertext-center mr-2">
                                                            <button data-modal-hide="popup-modal-<?= $user['id_user'] ?>" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5  ">
                                                                Yes, I'm sure
                                                            </button>
                                                        </div>
                                    </form>
                                    <input data-modal-hide="popup-modal-<?= $user['id_user'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" value="No,cancel" />

                                </td>
                                <td class="px-4 py-3 text-sm">


                                    <button data-modal-target="crypto-modal<?= $user['id_user'] ?>" data-modal-toggle="crypto-modal<?= $user['id_user'] ?>" class=" w-19 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple ">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z">
                                            </path>
                                        </svg>

                                    </button>
                                    <form class="space-y-2" action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                        <input type="hidden" name="mat_user" value="<?= $user['mat_user'] ?>">
                                        <input type="hidden" name="old_email" value="<?= $user['email'] ?>">
                                        <input type="hidden" name="old_name" value="<?= $user['name'] ?>">
                                        <input type="hidden" name="old_role" value="<?= $user['role'] ?>">
                                        <input type="hidden" name="old_password" value="<?= $user['password'] ?>">
                                        <input type="hidden" name="old_telnum" value="<?= $user['telnum'] ?>">
                                        <input type="hidden" name="old_fonction" value="<?= $user['Fonction'] ?>">
                                        <!-- Main modal -->
                                        <div id="crypto-modal<?= $user['id_user'] ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="crypto-modal<?= $user['id_user'] ?>">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <!-- Modal header -->
                                                    <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                                            Update User
                                                        </h3>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <div class="px-6 py-6 lg:px-8">
                                                            <input type="hidden" name="_method" value="PATCH">
                                                            <div>
                                                                <label for="mat_user" class="block mb-2 text-sm font-medium text-gray-900 ">Matricule</label>
                                                                <input type="mat_user" name="mat_user" id="mat_user" value="<?= $user['mat_user'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-700 block w-full p-2.5 dark:bg-gray-600" placeholder="matricule" readonly>
                                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">email</label>
                                                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-700 block w-full p-2.5 dark:bg-gray-600" value="<?= $user['email'] ?>" readonly>
                                                            </div>



                                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                                            <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder="Nom Agent">

                                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Telephone Number</label>
                                                            <input type="TelNum" name="TelNum" id="TelNum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder="TelNum Agent">

                                                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Role</label>
                                                            <select type="submit" id="role" name="role" class="text-black justify-center flex items-center bg-white hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                                <?= selectedOption('admin', $currentRole) ?>
                                                                <?= selectedOption('user', $currentRole) ?>
                                                            </select>
                                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                                                            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder="password Agent">
                                                            <label for="Fonction" class="block mb-2 text-sm font-medium text-gray-900 ">Fonction</label>
                                                            <input type="Fonction" name="Fonction" id="Fonction" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder="Fonction Agent">
                                                            <br>
                                                            <div class="border border-t-2 border-t-black"></div>
                                                            <button type="submit" class="w-full mt-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <script>
                <?php if (!empty($errors)) : ?>
                    document.addEventListener('DOMContentLoaded', function() {
                        var addUserModal = new bootstrap.Modal(document.getElementById('add-user-modal'));
                        addUserModal.show();
                    });
                <?php endif; ?>
            </script>
        </div>
        
        <div>
        <footer class="pt-10">
            <?php require base_path('views/admin/partials/foot.php') ?>
        </footer>

    </div>
</main>