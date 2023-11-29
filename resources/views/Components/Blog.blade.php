@props(['blog'])

<div class="mt-16 md:mt-8 px-3 pt-4">
     <div class="max-w-5xl mx-auto">
        {{-- blog title --}}
        <h1 class="text-4xl mb-4">{{$blog->title}}</h1>
        <img src="{{asset('storage/'.$blog->image)}}" alt="" srcset="" class="h-96 w-full">

        <div class="flex items-center justify-between">
            {{-- icons --}}

            <div class="flex items-center gap-x-4 mt-4">

                {{-- views --}}
    
                <div class="flex items-center gap-x-1">
                    {{-- icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-indigo-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{-- text --}}
                    <small class="text-gray-400">{{$blog->views}}</small>  
                </div>
    
                {{-- comments --}}
                <div class="flex items-center gap-x-1">
                    {{-- icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-indigo-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                    </svg>
    
                    {{-- text --}}
                  <small class="text-gray-400">100</small>  
                </div>
    
                {{-- comments --}}
                <div class="flex items-center gap-x-1">
                    {{-- icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-indigo-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                    </svg>
    
                    {{-- text --}}
                  <small class="text-gray-400">{{$blog->likes}}</small>  
                </div>
            </div>

            {{-- user details --}}
            <a href="#" class="text-base text-gray-500">posted by {{$blog->user->username}}</a>
        </div>
       
        
        {{-- blog content --}}
        <div class="my-4 py-2 max-w-4xl mx-auto">
            <p class="text-base mb-2">{{$blog->content}}</p>
             
             <form action="/comment" method="post" class="py-4 my-4">
                @csrf
                <input type="hidden" name="blog_id" value={{$blog->id}}>
                <div class="mb-4">
                    <label for="" class="text-base mb-2">Your Comment</label>
                    <textarea name="comment" value="{{old('comment')}}" id="" rows="5" class="px-2 py-1 border border-gray-400 rounded-sm w-full outline-0" placeholder="Write your comment"></textarea>
                    @error('password') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <x-Button type="submit">
                    post comment
                </x-Button>
             </form>

             {{-- comments components --}}
            <x-Comments :comments="$blog->comments"/>
        </div>
     </div>
</div>