<div class="flex h-full bg-gray-50">
    <!-- Desktop sidebar -->
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0 ">
        <div class="py-4 text-gray-500 ">
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <?= urlIs('/dashboard') ? '<span
                class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>' : '' ?>

                    <a class="<?= urlIs('/dashboard') ? 'text-gray-800' : '' ?> inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 no-underline"
                        href="/dashboard">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <span class="ml-4">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="relative px-6 py-3">
                    <?= urlIs('/usercontrol') ? '<span
                class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>' : '' ?>
                    <a class="<?= urlIs('/usercontrol') ? 'text-gray-800' : '' ?> no-underline inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 "
                        href="/usercontrol">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"
                            fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z">
                            </path>
                        </svg>
                        <span class="ml-4">Agents</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <?= urlIs('/categorycontrol') ? '<span
                class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>' : '' ?>
                    <a class=" <?= urlIs('/categorycontrol') ? 'text-gray-800' : '' ?> no-underline inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="/categorycontrol">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                        </svg>

                        <span class="ml-4">Categories</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <?= urlIs('/subcategorycontrol') ? '<span
                class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>' : '' ?>
                    <a class=" <?= urlIs('/subcategorycontrol') ? 'text-gray-800' : '' ?> no-underline inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="/subcategorycontrol">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                        <span class="ml-4">Subcategories</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <?= urlIs('/localcontrol') ? '<span
                class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>' : '' ?>
                    <a class="<?= urlIs('/localcontrol') ? 'text-gray-800' : '' ?> no-underline inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="/localcontrol">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21">
                            </path>

                        </svg>
                        <span class="ml-4">Local control</span>
                    </a>
                </li>
                <li class="relative px-6 py-3">
                    <?= urlIs('/localassign') ? '<span
                class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>' : '' ?>
                    <a class="<?= urlIs('/localassign') ? 'text-gray-800' : '' ?> no-underline inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="/localassign">
                      
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg>

                        <span class="ml-4">Assign Offices</span>
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <?= urlIs('/equipmentcontrol') ? '<span
                class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>' : '' ?>

                    <a class="<?= urlIs('/equipmentcontrol') ? 'text-gray-800' : '' ?> no-underline inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        href="/equipmentcontrol">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        <span class="ml-4">Equipments Control</span>
                    </a>
                </li>
                <div class="px-6 my-6">
                    <a class="text-lg  hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="/">
                        <button
                            class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                            Interface Agent
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8.25V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18V8.25m-18 0V6a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6zM7.5 6h.008v.008H7.5V6zm2.25 0h.008v.008H9.75V6z">
                                </path>
                            </svg>
                        </button>
                    </a>
                </div>
            </ul>

        </div>
    </aside>