<div class="relative w-full h-24 w-full mb-4">
    <nav class="bg-white border-gray-200 dark:bg-gray-900 relative">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="/blogs" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Blog Me</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse relative">

                {{-- create blog link --}}
                @auth    
                 <a href="/create" class="border border-white px-4 py-1 text-white text-base text-center hover:bg-gray-600">Create Blog</a>
                @endauth

                {{-- icon --}}
               <span id="dropdownbtn" class="hover:cursor-pointer">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                  </svg>                  
               </span>

               

               {{-- dropdown --}}
               <div id="dropdown" class="absolute hidden top-[12px] right-[6px] z-50 my-4 text-base list-none bg-white  rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                 
                {{-- close icon --}}
                <div class="flex justify-end">
                    <span id="closebtn" class="p-1 hover:cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>    
                    </span>
                 </div>

                <div class="px-4 py-1 border-b border-gray-100">
                    @auth
                        <span class="block text-sm text-gray-900 dark:text-white">{{auth()->user()->username}}</span>
                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{auth()->user()->email}}</span>
                    @endauth
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                  <li>
                    <a href="/myblogs" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">My Blogs</a>
                  </li>
                  <li>
                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                  </li>
                  <li>
                    <form  method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="block px-4 w-full py-2 text-left text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
                    </form>
                  </li>
                </ul>
              </div>
              {{-- dropdown --}}

            </div>
        </div>
    </nav>
    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="w-full md:max-w-screen-xl px-4 py-3 mx-auto flex flex-col md:flex-row gap-y-2 md:gap-y-0 md:items-center md:justify-between">
            <div class="flex items-center">
                {{-- links --}}
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="/blogs" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="/blog/tag/tech" class="text-gray-900 dark:text-white hover:underline">Technology</a>
                    </li>
                    <li>
                        <a href="/blog/tag/fashion" class="text-gray-900 dark:text-white hover:underline">Fashion</a>
                    </li>
                    <li>
                        <a href="/blog/tag/food" class="text-gray-900 dark:text-white hover:underline">Food</a>
                    </li>
                    <li>
                        <a href="/blog/tag/sport" class="text-gray-900 dark:text-white hover:underline">Sport</a>
                    </li>
                    <li>
                        <a href="/blog/tag/travel" class="text-gray-900 dark:text-white hover:underline">Travel</a>
                    </li>
                </ul>
            </div>

            {{-- search --}}

            <form action="/search" method="post" class="flex items-center gap-x-2">
                @csrf
                <input type="text" name="search" id="search-navbar" class="block w-full md:w-44 py-2 px-2 text-sm border border-gray-300 rounded-sm outline-0  bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:border-gray-200 " placeholder="Search...">
                 <button type="submit" class="p-2 flex items-center justify-center rounded-sm bg-gray-100/50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>                      
                 </button>
            </form>
        </div>
    </nav>

@push('scripts')
    <script>
        let dropdown = document.querySelector('#dropdown')
        let dropdownbtn = document.getElementById('dropdownbtn')
        let closebtn = document.getElementById('closebtn')

        dropdownbtn.addEventListener('click',()=>{
            dropdown.classList.toggle('hidden')
        })

        closebtn.addEventListener('click',()=>{
            if(!dropdownbtn.classList.contains('hidden')){
                dropdown.classList.add('hidden')
            }
        })
    </script>
@endpush
</div>

