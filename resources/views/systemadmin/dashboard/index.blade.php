<x-app-layout>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                </div>
            </li>
        </ol>
    </nav>

    @if(session()->has('message'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('message') }}!</span>
        </div>
    </div>
    @endif

    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Dashboard</h3>
    <div class="p-4 mb-3 rounded-lg bg-gray-50 dark:bg-gray-800 border border-dashed">
        <p class="text-sm text-gray-500 dark:text-gray-400 italic">This is the dashboard where you can view visual representations of various data, including the total number of active voters, the number of voters per municipalities, and bar graphs displaying voter distribution across municipalities. It also provides insights into the gender distribution of active voters, showing the number of males and females, as well as the age brackets of the voters.</p>
    </div>

    <!-- Card Section -->

    <!-- Card Data -->
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div class="w-full">
            <div class="max-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex items-center">
                <div class="flex-1">
                    <a href="#">
                        <h6 class="mb-2 text-2xl font-semibold tracking-tight text-gray-600 dark:text-white">Total Active Voters ({{ number_format($totalActiveVoter) }})</h6>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"></p>
                    <a href="{{ route('system-admin-dashboard-totalvoter') }}" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        Click to view details
                    </a>
                </div>
                <svg class="w-10 h-10 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="w-full">
            <div class="max-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex items-center">
                <div class="flex-1">
                    <a href="#">
                        <h6 class="mb-2 text-xl font-semibold tracking-tight text-gray-600 dark:text-white">Voter Faction (Municipal Level Data) ({{ number_format(0) }})</h6>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"></p>
                    <a href="{{ route('system-admin-dashboard-voterfaction') }}" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        Click to view details
                    </a>
                </div>
                <svg class="w-10 h-10 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="w-full">
            <div class="max-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex items-center">
                <div class="flex-1">
                    <a href="#">
                        <h6 class="mb-2 text-2xl font-semibold tracking-tight text-gray-600 dark:text-white">Scanned QR ({{ 0 }})</h6>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"></p>
                    <a href="{{ route('system-admin-dashboard-totalscan') }}" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        Click to view details
                    </a>
                </div>
                <svg class="w-10 h-10 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6H4V4Zm10 10h6v6h-6v-6Zm0-10h6v6h-6V4Zm-4 10h.01v.01H10V14Zm0 4h.01v.01H10V18Zm-3 2h.01v.01H7V20Zm0-4h.01v.01H7V16Zm-3 2h.01v.01H4V18Zm0-4h.01v.01H4V14Z" />
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M7 7h.01v.01H7V7Zm10 10h.01v.01H17V17Z" />
                </svg>

            </div>
        </div>
    </div>


</x-app-layout>