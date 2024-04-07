<div class="flex flex-col flex-1 w-full">
<header class="top-0 z-50 w-full  border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3  "> 
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
       
        <a href="/" class="flex ms-2 md:me-24">
          <img src="images/steg.png" class="h-10 me-3" alt="Steg LOGO" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white"></span>
        </a>
      </div>


      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-lg  rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <i class="fa fa-user" aria-hidden="true"></i>
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
              <p class="text-sm text-gray-900 dark:text-white" role="none">
                <?= $_SESSION['name'] ?>
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  <?= $_SESSION['email'] ?>
              </p>
              <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                 Matricule :<?= $_SESSION['mat_user'] ?>
              </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="/Logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</header>
</div>
