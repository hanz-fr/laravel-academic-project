{{-- 
<div class="bg-white h-auto  sm:hidden md:visible xl:visible 2xl:visible md:w-40 lg:w-72 border-gray-300 border-r shadow-xl">
    <div class="flex flex-col">
      <p class="uppercase text-xs text-gray-600 tracking-wider mt-8 mb-5 px-5 md:mx-auto lg:mx-auto">Dashboard</p>

      <div class="mt-3 px-2 flex justify-start sm:ml-3 md:ml-5">
        <a href="/" class="mb-3 capitalize font-medium text-sm hover:text-teal-400 transition ease-in-out duration-200 {{ $active === "dashboard" ? 'text-teal-400' : '' }}">
          <i class="fas fa-list-alt text-xs mr-1"></i>                
          Dashboard
        </a>
      </div>
      
      <div class="mt-3 px-2 flex justify-start sm:ml-3 md:ml-5">
        <a href="/students" class="mb-3 capitalize font-medium text-sm hover:text-teal-400 transition ease-in-out duration-200 {{ $active === "students" ? 'text-teal-400' : '' }}">
          <i class="fas fa-users text-xs mr-1"></i>                
          Students
        </a>
      </div>

      <div class="mt-3 px-2 flex justify-start sm:ml-3 md:ml-5">
        <a href="/teachers" class="mb-3 capitalize font-medium text-sm hover:text-teal-400 transition ease-in-out duration-200 {{ $active === "teachers" ? 'text-teal-400' : '' }}">
          <i class="fas fa-users text-xs mr-1"></i>                
          Teachers
        </a>
      </div>

      <div class="mt-3 px-2 flex justify-start sm:ml-3 md:ml-5">
        <a href="/subjects" class="mb-3 capitalize font-medium text-sm hover:text-teal-400 transition ease-in-out duration-200 {{ $active === "subjects" ? 'text-teal-400' : '' }}">
          <i class="fas fa-book text-xs mr-1"></i>                
          Subjects
        </a>
      </div>

      <div class="mt-3 px-2 flex justify-start sm:ml-3 md:ml-5">
        <a href="/classes" class="mb-3 capitalize font-medium text-sm hover:text-teal-400 transition ease-in-out duration-200 {{ $active === "classes" ? 'text-teal-400' : '' }}">
          <i class="fas fa-th-list text-xs mr-1"></i>                
          Class
        </a>
      </div>

      <div class="mt-3 px-2 flex justify-start sm:ml-3 md:ml-5">
        <a href="./index.html" class="mb-3 capitalize font-medium text-sm hover:text-teal-400 transition ease-in-out duration-200">
          <i class="fad fa-user-circle text-xs mr-1"></i>                
          My Profile
        </a>
      </div>

    </div>
</div> --}}

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="md:flex flex-col md:flex-row md:min-h-screen">
  <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
    <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
      <a href="/" class="mt-0 md:mt-5 text-xs font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Dashboard</a>
      <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
    <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto w-full shadow-lg bg-white absolute z-10 md:relative md:z-0">
      <button class="absolute top-0 right-6 rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
          <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
      <a class="block px-4 py-2 mt-12 md:mt-2 text-sm text-gray-900 {{ $active === "dashboard" ? 'bg-teal-400 font-bold text-white' : 'font-semibold' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:font-semibold transition ease-in focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/"><i class="fas fa-list-alt text-xs mr-1"></i> Dashboard</a>
      <a class="block px-4 py-2 mt-2 text-sm text-gray-900 {{ $active === "students" ? 'bg-teal-400 font-bold text-white' : 'font-semibold' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:font-semibold transition ease-in focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/students"><i class="fas fa-users text-xs mr-1"></i> Students</a>
      <a class="block px-4 py-2 mt-2 text-sm text-gray-900 {{ $active === "teachers" ? 'bg-teal-400 font-bold text-white' : 'font-semibold' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:font-semibold transition ease-in focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/teachers"><i class="fas fa-users text-xs mr-1"></i> Teachers</a>
      <a class="block px-4 py-2 mt-2 text-sm text-gray-900 {{ $active === "classes" ? 'bg-teal-400 font-bold text-white' : 'font-semibold' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:font-semibold transition ease-in focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/classes"><i class="fas fa-th-list text-xs mr-1"></i> Classes</a>
      <a class="block px-4 py-2 mt-2 text-sm text-gray-900 {{ $active === "subjects" ? 'bg-teal-400 font-bold text-white' : 'font-semibold' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:font-semibold transition ease-in focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/subjects"><i class="fas fa-book text-xs mr-1"></i> Subjects</a>
      <a class="block px-4 py-2 mt-2 text-sm text-gray-900 {{ $active === "reports" ? 'bg-teal-400 font-bold text-white' : 'font-semibold' }} rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 hover:font-semibold transition ease-in focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/reports"><i class="fas fa-address-book text-xs mr-1"></i> Reports</a>
      <div @click.away="open = false" class="relative" x-data="{ open: false }">
        @if(auth()->check())
        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-300 transition ease-in focus:outline-none focus:shadow-outline">
          <span class="flex flex-row">
            {{ auth()->user()->nama }}
            <ion-icon name="chevron-down-outline" class="text-lg ml-2"></ion-icon>
          </span>
          {{-- <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> --}}
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
          <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">My Profile</a>
            <form action="/logout" method="POST" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
              @csrf
              <button type="submit" class="w-full text-left">Logout</button>
            </form>
          </div>
        </div>
        @else
        @endif
      </div>
    </nav>
  </div>
</div>