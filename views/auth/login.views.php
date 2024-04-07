<?php require base_path('views/partials/head.php') ?>

<main >
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8 ">
  <div class=" w-full max-w-md space-y-8 ">
    <div>
      <img class="mx-auto h-24 w-auto " src="images/STEG.png" alt="Your Company">
      <br><br>
      <h2 class="mt-6 text-center text-2xl font-bold tracking-tight text-gray-900">Connectez-vous à votre compte</h2>
    </div>
    <form class="mt-8 space-y-6" action="/login" method="POST">
      <div class="-space-y-px rounded-md shadow-sm">
        <div>
          <label for="mat_user" class="sr-only">Matricule</label>
          <input id="mat_user" name="mat_user" type="mat_user"  required class="mb-2 relative block w-full appearance-none rounded-none rounded-t-md rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder ="Matricule">
        </div>
        <?php if (isset($errors['mat_user'])): ?>

          <div x-show="showAlert" x-data="{ showAlert: true }" class=" bg-red-100 border border-red-400 text-red-700 px-2 py-1 rounded relative" role="alert">

            <span class="block sm:inline"><?= $errors['mat_user'] ?></span>

            <span x-on:click="showAlert = false" class="absolute top-0 bottom-0 right-0 px-2 py-1">
              <svg aria-label="Close" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
              </svg>
            </span>
          </div>
        <?php endif; ?>
        <div>
          <label for="password" class="sr-only">Mot de passe</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="mt-4 mb-2 relative block w-full appearance-none rounded-none  rounded-t-md rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Mot de passe">
        </div>
        <?php if (isset($errors['password'])) : ?>
          <div x-show="showAlert" x-data="{ showAlert: true }" class=" bg-red-100 border border-red-400 text-red-700 px-2 py-1 rounded relative" role="alert">

            <span class="block sm:inline"><?= $errors['password'] ?></span>

            <span x-on:click="showAlert = false" class="absolute top-0 bottom-0 right-0 px-2 py-1">
              <svg aria-label="Close" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
              </svg>
            </span>
          </div>
        <?php endif; ?>
      </div>
      <div>
        <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-blue-800 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-blue group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
            </svg>
          </span>
          CONNECTER
        </button>
      </div>
    </form>
  </div>
</div>

</main>


