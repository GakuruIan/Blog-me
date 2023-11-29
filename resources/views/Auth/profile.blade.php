@extends('layouts.app')

@section('content')
    <div class="h-screen w-full flex items-center justify-center px-2 md:px-0">
        <div class="max-w-6xl">
            <header>
                <h1 class="text-4xl text-center mb-4">Welcome to Blog-Me</h1>
                <p class="text-xl font-medium text-center text-gray-500 mb-4">Edit Profile</p>
            </header>
            {{-- form --}}
            <form class="space-y-4 md:space-y-6" method="POST" action="/update/profile">
               @csrf
                <div>
                    <label for="username" class="block mb-2 text-base text-gray-500">Create Username</label>
                    <input type="text" name="username" id="email" value="{{$user->username}}" class="border border-gray-300 text-gray-900 sm:text-sm  focus:ring-indigo-600 focus:border-gray-600 block w-full p-2.5" placeholder="John doe" required>
                    @error('username') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-base text-gray-500">Your email</label>
                    <input type="email" name="email" id="email" value="{{$user->email}}" class="border border-gray-300 text-gray-900 sm:text-sm  focus:ring-indigo-600 focus:border-gray-600 block w-full p-2.5" placeholder="name@gmail.com" required>
                    @error('email') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label for="password" class="block mb-2 text-base text-gray-500">Change Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="border border-gray-300 text-gray-900 sm:text-sm focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 ">
                    @error('password') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password" class="block mb-2 text-base text-gray-500">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password" placeholder="••••••••" class="border border-gray-300 text-gray-900 sm:text-sm focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 ">
                    @error('password_confirmation') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                    <x-Button type="submit">
                        Update Profile
                    </x-Button>
            </form>
        </div>
    </div>
@endsection