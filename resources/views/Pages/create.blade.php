@extends('layouts.app')

@section('content')
    <x-Navbar/>
    <div class="h-[calc(100vh-150px)] w-full flex items-center justify-center px-2 md:px-0">
        <div class="max-w-6xl w-96">
            <h1 class="text-4xl text-center mb-4">Create blog</h1>

            {{-- form --}}
            <form class="space-y-4 md:space-y-6"  method="POST" action="/create/blog" enctype="multipart/form-data">
               @csrf
                <div>
                    <label for="title" class="block mb-2 text-base text-gray-500">Blog title</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title" class="border border-gray-300 text-gray-900 sm:text-sm outline-0 focus:ring-indigo-600 focus:border-gray-600 block w-full p-2.5" placeholder="name@gmail.com" required>
                    @error('title') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2">
                    <label for="tag" class="block mb-2 text-base text-gray-500">Blog Tag</label>
                    <select id="tag" name="tag" class="border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="tech">Technology</option>
                        <option value="fashion">Fashion</option>
                        <option value="sport">Sport</option>
                        <option value="food">Food</option>
                        <option value="travel">Travel</option>
                    </select>
                    @error('tag') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="mb-2">
                    <label for="content" class="block mb-2 text-base text-gray-500">Blog Content</label>
                    <textarea name="content" value="{{ old('content') }}" id="content" rows="8" class="px-2 py-1 border border-gray-400 rounded-sm w-full outline-0" placeholder="Write your comment"></textarea>
                    @error('content') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="" class="block mb-2 text-base text-gray-500">Choose Image</label>
                    <input name="image" class="block w-full text-sm py-1 text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 " id="file" type="file">
                    @error('image') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                    <x-Button type="submit">
                        Post Blog
                    </x-Button>
            </form>
        </div>
    </div>
@endsection