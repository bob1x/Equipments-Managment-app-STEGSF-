<?php require base_path ('views/partials/head.php') ?>
<?php require base_path ('views/partials/nav.php') ?>
<?php
function selectedOption($value, $currentRole)
{ 
  $selected = ($currentRole == $value) ? 'selected' : '';
    return "<option value=\"$value\" $selected>$value</option>";
}
?>
<main class="h-full overflow-y-auto">
    <?php foreach ($currentUser as $user) : ?>

    <div class="container mx-auto py-8">
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
            <div class="col-span-4 sm:col-span-3">

                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex flex-col items-center">
                        <img src="images/avatar-1577909_640.png"
                            class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                        </img>

                        <h1 class="text-xl font-bold"><?= $_SESSION['name'] ?></h1>
                        <p class="text-gray-700"><?= $user['Fonction'] ?></p>
                      
                    </div>
                    <hr class="my-6 border-t border-gray-300">
                    <div class="flex flex-col">
                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Offices</span>
                        <?php foreach ($offices as $bureau) : ?>
                        <ul>
                            <li class="mb-2">
                                <span class="text-gray-700"><?= $bureau["office_name"]?>:
                                    <b><?= $bureau["placement"]?></b></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-4 sm:col-span-9">
                <div class="  p-2 justify-center">
                    <form class="space-y-2 w-auto" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                        <input type="hidden" name="mat_user" value="<?= $user['mat_user'] ?>">
                        <input type="hidden" name="old_email" value="<?= $user['email'] ?>">
                        <input type="hidden" name="old_name" value="<?= $user['name'] ?>">
                        <input type="hidden" name="old_password" value="<?= $user['password'] ?>">
                        <input type="hidden" name="old_telnum" value="<?= $user['telnum'] ?>">
                        <input type="hidden" name="old_fonction" value="<?= $user['Fonction'] ?>">
                        <!-- Main modal -->
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div class="px-6 py-6 lg:px-8">
                                        <input type="hidden" name="_method" value="PATCH">
                                        <div>
                                            <label for="mat_user"
                                                class="block mb-2 text-sm font-medium text-gray-900 ">Matricule</label>
                                            <input type="mat_user" name="mat_user" id="mat_user"
                                                value="<?= $user['mat_user'] ?>"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-700 block w-full p-2.5 dark:bg-gray-600"
                                                placeholder="matricule" readonly>
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 ">email</label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-700 block w-full p-2.5 dark:bg-gray-600"
                                                value="<?= $user['email'] ?>" readonly>
                                        </div>
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">name</label>
                                        <input type="name" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  "
                                            placeholder="Nom Agent">

                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">TelNum</label>
                                        <input type="TelNum" name="TelNum" id="TelNum"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  "
                                            placeholder="TelNum Agent">
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">password</label>
                                        <input type="password" name="password" id="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  "
                                            placeholder="password Agent">
                                        <label for="Fonction"
                                            class="block mb-2 text-sm font-medium text-gray-900 ">Fonction</label>
                                        <input type="Fonction" name="Fonction" id="Fonction"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  "
                                            placeholder="Fonction Agent">
                                        <button type="submit"
                                            class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<footer class="pt-20">
  <?php require base_path('views/partials/foot.php') ?>
</footer>
</main>