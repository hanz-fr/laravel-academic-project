

<div class="hidden sm:hidden md:visible lg:visible xl:visible md:flex flex-row justify-between md:h-24 lg:h-24 bg-white md:p-8 {{-- border-b border-gray-300 --}} drop-shadow-md">
    
    <p class="font-bold text-lg md:text-2xl lg:text-3xl xl:text-3xl">iStudent</p>
    
    @auth
    {{-- <button id="dropdownButton" data-dropdown-toggle="dropdown" class="text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button> --}}
    
    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-flex items-center transition ease-in font-bold mr-8 text-md hover:text-sky-500 active:text-sky-700">{{ auth()->user()->nama }}<svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

    <div id="dropdown" class="hidden z-10 w-44 h-10 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
        <li>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="py-2 text-sm w-full text-gray-700 hover:bg-gray-100 hover:rounded dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
          </form>
        </li>
      </ul>
    </div>
    
    @else
    <div class="capitalize flex flex-row justify-center transition ease-in delay-[20] hover:text-teal-400">
      <i class="fa fa-sign-in ml-2 text-sm my-auto leading-none"></i>
      <a href="/login" class="font-bold ml-1 my-auto">Login</a>
    </div>
    @endauth
    
    {{-- <div class="capitalize flex">
      <i class="mt-1 fad fa-user-circle mr-3 sm:text-xs md:text-md lg:text-[30px] text-sky-300"></i>
      <h1 class=" sm:text-xs md:text-md lg:text-lg text-gray-800 font-semibold m-0 p-0 leading-none">moeSaid</h1>
      <i class="fad fa-chevron-down ml-2 sm:text-xs md:text-md lg:text-lg leading-none"></i>
    </div>  --}}
</div>