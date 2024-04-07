<?php require base_path('views/admin/partials/head.php'); ?>
<?php require base_path('views/admin/partials/header.php') ?>
<?php require base_path('views/admin/partials/aside.php') ?>




<main class=" p-5 w-full h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid ">
        <h1 class="my-6 text-2xl font-semibold text-black-700 dark:text-gray-200 ">
            <?= $heading ?>
        </h1>
        <!-- Add Local Button -->
        <div class="px-6 my-6 flex justify-between ">
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="flex items-center justify-between w-60 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-lg active:bg-red-500 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                Ajout equipments
                <span class="ml-2" aria-hidden="true">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                    </svg>
                </span>
            </button>
        </div>
        <!-- end of local -->
        <!-- Main modal -->
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
                        <h3 class="mb-4 text-xl font-medium text-gray-900 ">Add new equipment to our platform
                        </h3>
                        <form class="space-y-2" action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="STORE">
                            <div>
                                <label for="Referance" class="block mb-2 text-sm font-medium text-gray-900 ">Referance</label>
                                <input type="Referance" name="Referance" id="Referance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder="REF" required>
                            </div>
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">name</label>
                                <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder=" name" required>
                            </div>
                            <div>
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">description</label>
                                <input type="description" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder="description">
                            </div>

                            <label for="SubCategory" class="block mb-2 text-sm font-medium text-gray-900">Select
                                SubCategory</label>
                            <select name="id_subcategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected>Choose the SubCategory</option>
                                <?php foreach ($subcategories as $subcategory) : ?>
                                    <option value="<?= $subcategory['id_subcategory'] ?>"><?= $subcategory['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <div class="flex items-center justify-center w-full">

                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-54 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100 ">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">

                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                                upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" name="fileToUpload" class="hidden" required />
                                </label>
                            </div>

                            <button class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex-auto">
        <form class="flex items-center" method="POST" action="/equipmentcontrol">
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
                </svg>Search
            </button>
        </form>
    </div>


    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Referance</th>
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Sub Category</th>
                        <th class="px-4 py-3">Delete</th>
                        <th class="px-4 py-3">Update</th>
                    </tr>
                </thead>

                <tbody class="text-left bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php $x = 0 ?>
                    <?php foreach ($equipments as $equipment) : ?>
                        <?php $x++ ?>

                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-20 h-20  rounded-full md:block">
                                        <img class=" object-cover w-full h-full rounded-lg" src="<?= $equipment['image'] ?>" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-lg shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">
                                    <?= $equipment['Referance'] ?>
                                </p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">
                                    <?= $equipment['name'] ?>
                                </p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">
                                    <?= $equipment['description'] ?>
                                </p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="font-semibold">
                                    <?php foreach ($subcategories as $subcategory) : ?>
                                        <?php if ($equipment['id_subcategory'] == $subcategory['id_subcategory']) : ?>
                                            <?= $subcategory['name'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </p>
                            </td>
                            <td class="px-4 py-3 text-sm">


                                <button data-modal-target="popup-modal<?= $x ?>" data-modal-toggle="popup-modal<?= $x ?>" class="block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>

                                </button>
                                <form action="" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="Referance" value="<?= $equipment['Referance'] ?>">
                                    <div id="popup-modal<?= $x ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal<?= $x ?>">
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
                                                        to delete <?= $equipment['name'] ?> ?</h3>

                                                    <div class="inline-flex items-centertext-center mr-2">
                                                        <button data-modal-hide="popup-modal<?= $x ?>" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5  ">
                                                            Yes, I'm sure
                                                        </button>
                                                    </div>
                                                    <input data-modal-hide="popup-modal<?= $x ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" value="No,cancel" />

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td class="px-4 py-3 text-sm">


                                <button data-modal-target="crypto-modal<?= $x ?>" data-modal-toggle="crypto-modal<?= $x ?>" class=" w-19 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple ">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z">
                                        </path>
                                    </svg>

                                </button>
                                <form class="space-y-2" action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id_equipment" value="<?= $equipment['id_equipment'] ?>">
                                    <input type="hidden" name="Referance" value="<?= $equipment['Referance'] ?>">
                                    <input type="hidden" name="old_id_subcategory" value="<?= $equipment['id_subcategory'] ?>">
                                    <input type="hidden" name="old_name" value="<?= $equipment['name'] ?>">
                                    <input type="hidden" name="old_image" value="<?= $equipment['image'] ?>">
                                    <input type="hidden" name="old_description" value="<?= $equipment['description'] ?>">

                                    <!-- Main modal -->
                                    <div id="crypto-modal<?= $x ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="crypto-modal<?= $x ?>">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <!-- Modal header -->
                                                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                                        Update the equipment
                                                    </h3>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <div class="px-6 py-6 lg:px-8">
                                                        <input type="hidden" name="_method" value="PATCH">
                                                        <div>
                                                            <label for="Referance" class="block mb-2 text-sm font-medium text-gray-900 ">Referance</label>
                                                            <input type="Referance" name="Referance" id="Referance" class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder="<?= $equipment['Referance'] ?>" readonly>
                                                        </div>
                                                        <div>
                                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">name</label>
                                                            <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder="Name goes here ">
                                                        </div>
                                                        <div>
                                                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">description</label>
                                                            <input type="description" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600  " placeholder="Description goes here ">
                                                        </div>
                                                        <label for="subcategory" class="block mb-2 text-sm font-medium text-gray-900">Select
                                                            subCategory</label>
                                                        <select name="subcategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                            <option selected>Choose the subCategory</option>
                                                            <?php foreach ($subcategories as $subcategory) : ?>
                                                                <option value="<?= $subcategory['id_subcategory'] ?>"><?= $subcategory['name'] ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <label for="dropzone-file<?= $x ?>" class="block mb-2 text-sm font-medium text-gray-900 ">Equipment
                                                            picture
                                                        </label>
                                                        <div class="flex items-center justify-center w-full">

                                                            <label for="dropzone-file<?= $x ?>" class="flex flex-col items-center justify-center w-full h-54 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100 ">
                                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                                        </path>
                                                                    </svg>
                                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                                                            upload</span> or drag and drop</p>
                                                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                                                        (MAX. 800x400px)</p>
                                                                </div>
                                                                <input id="dropzone-file<?= $x ?>" type="file" name="fileToUpload-update" class="hidden" />
                                                            </label>
                                                        </div>
                                                        <button data-modal-target="bottom-left-modal" data-modal-toggle="bottom-left-modal" class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
    </div>
   
    <footer class="pt-10">
        <?php require base_path('views/admin/partials/foot.php') ?>
    </footer>
</main>