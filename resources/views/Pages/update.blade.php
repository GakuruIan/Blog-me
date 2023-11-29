@extends('layouts.app')

@section('content')
    <x-Navbar/>
    <div class="h-[calc(100vh-150px)] w-full flex items-center justify-center px-2 md:px-0">
        <div class="max-w-6xl w-96">
            <h1 class="text-4xl text-center mb-4">Update blog</h1>

            {{-- form --}}
            <form  action="/Update/blog/{{$blog->id}}" method="POST" enctype="multipart/form-data">
                @method("put")
               @csrf
                <div>
                    <label for="title" class="block mb-2 text-base text-gray-500">Blog title</label>
                    <input type="text" name="title" value={{$blog->title}} id="title" class="border border-gray-300 text-gray-900 sm:text-sm outline-0 focus:ring-indigo-600 focus:border-gray-600 block w-full p-2.5" placeholder="name@gmail.com" required>
                    @error('title') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2">
                    <label for="tag" class="block mb-2 text-base text-gray-500">Blog Tag</label>
                    <select id="tag" name="tag" class="border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="tech" @if ($blog->tag === 'tech') selected @endif>Technology</option>
                        <option value="fashion" @if ($blog->tag === 'fashion') selected @endif>Fashion</option>
                        <option value="sport" @if ($blog->tag === 'sport') selected @endif>Sport</option>
                        <option value="food" @if ($blog->tag === 'food') selected @endif>Food</option>
                        <option value="travel" @if ($blog->tag === 'travel') selected @endif>Travel</option>
                    </select>
                    @error('tag') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2">
                    <label for="content" class="block mb-2 text-base text-gray-500">Blog Content</label>
                    <textarea name="content" id="content" rows="8" class="px-2 py-1 border border-gray-400 rounded-sm w-full outline-0" placeholder="Write your comment">{{$blog->content}}</textarea>
                    @error('content') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex gap-x-2 mb-2">
                    <div class="">
                        <img src="{{asset('storage/'.$blog->image)}}" alt="" srcset="" class="h-24 w-64 object-fit">
                    </div>
    
                    <div class="">
                        <label for="" class="block mb-2 text-base text-gray-500">Choose Image</label>
                        <input name="image" class="block w-full text-sm py-1 text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 " id="file" type="file">
                        @error('image') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    
                </div>

                
                    <x-Button type="submit">
                        Post Blog
                    </x-Button>
            </form>
        </div>
    </div>
@endsection