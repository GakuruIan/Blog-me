@props(['blogs'])

<div class="relative mt-16 md:mt-8 px-3 pt-4">

   @if (count($blogs) > 0)
                @foreach ($blogs as $blog)
                {{--single blog list --}}
                    <div class="py-2 mb-4 flex flex-col md:flex-row gap-x-2">
                        {{-- image --}}
                        <img src="{{asset('storage/'.$blog->image)}}" alt="" srcset="" class="h-56 w-full md:w-96 object-fit">
                        <div class="">
                            <a href="blog/{{$blog->id}}" class="text-xl font-medium mb-2 max-w-2xl">{{$blog->title}}</a>
                            <p class="text-base text-gray-600 mb-4 max-w-2xl ">{{$blog->content}}</p>
                            <a href="blog/tag/{{$blog->tag}}" class="text-base text-gray-700  px-2 py-1 bg-gray-200 rounded-md">{{$blog->tag}}</a>
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
                        
                                {{-- delete --}}
                                
                                @if ($blog->user_id == auth()->user()->id)
                                    <div class="flex items-center gap-x-1">
                                        {{-- icon --}}
                                        <a href="/Edit/blog/{{$blog->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-indigo-700">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>                                      
                                        </a>

                                    </div>

                                    <div class="flex items-center gap-x-1">

                                        <form action="/delete/blog" method="POST" class="p-0 flex items-center justify-center">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="id" value="{{$blog->id}}">
                                            {{-- icon --}}
                                            <button type="submit" class="p-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-red-700">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    

                                    </div>

                                @endif
                                

                                
                                
                            </div>
                        </div>
                    </div>
                {{--end single blog list  --}}
                @endforeach
   @else
       <div class=" h-[calc(100vh-150px)] flex items-center justify-center">
           <h1 class="text-4xl text-center text-gray-400">No Blogs </h1>
       </div>
   @endif
  
  
</div>