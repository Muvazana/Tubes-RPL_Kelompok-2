<div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow pt-5 bg-white border-2 overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
            <a href="/" class="font-bold text-black text-3xl italic ">Kuy Imun</a>
        </div>
        <div class="mt-5 flex-1 flex flex-col">
            <nav class="flex-1 px-2 pb-4 space-y-1">
                <!-- Current: "bg-indigo-800 text-white", Default: "text-indigo-100 hover:bg-indigo-600" -->
                <a href="/admin" class="text-gray-500 hover:bg-blue-300 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/home -->
                    <svg class="mr-3 flex-shrink-0 h-6 w-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <a href="/admin/schedule" class="text-gray-500 hover:bg-blue-300 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/users -->
                    <svg class="mr-3 flex-shrink-0 h-6 w-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Schedule
                </a>

                <a href="/admin/vaccine" class="text-gray-500 hover:bg-blue-300 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/folder -->
                    <svg class="mr-3 flex-shrink-0 h-6 w-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                    Vaccine
                </a>

                <a href="/admin/patient" class="text-gray-500 hover:bg-blue-300 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/calendar -->
                    <svg class="mr-3 flex-shrink-0 h-6 w-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Patient
                </a>

                <a href="/admin/log" class="text-gray-500 hover:bg-blue-300 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/inbox -->
                    <svg class="mr-3 flex-shrink-0 h-6 w-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    Log
                </a>
            </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
            <div href="#" class="flex-shrink-0 w-full group block">
                <div class="flex items-center">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                            <!-- Session::get('user')->name -->
                        </p>
                        <a href="/logoutAction" class="text-xs font-medium text-gray-500 group-hover:text-gray-700">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>