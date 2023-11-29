@extends('layouts.app')

@section('content')
    <div class="h-screen w-full flex items-center justify-center px-2 md:px-0">
        <div class="max-w-6xl">
            <header>
                <h1 class="text-4xl text-center mb-4">Welcome to Blog-Me</h1>
                <p class="text-xl font-medium text-center text-gray-500 mb-4">Create An Account</p>
            </header>
           
            {{-- form --}}
            <form class="space-y-4 md:space-y-6" action="/register" method="POST">
                 @csrf
                <div>
                    <label for="username" class="block mb-2 text-base text-gray-500">Create Username</label>
                    <input type="text"  name="username" value="{{ old('username') }}" id="username" class="border border-gray-300 text-gray-900 sm:text-sm  focus:ring-indigo-600 focus:border-gray-600 block w-full p-2.5" placeholder="John doe" required>
                    @error('username') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-base text-gray-500">Your email</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email" class="border border-gray-300 text-gray-900 sm:text-sm  focus:ring-indigo-600 focus:border-gray-600 block w-full p-2.5" placeholder="name@gmail.com" required>
                    @error('email') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label for="password" class="block mb-2 text-base text-gray-500">Password</label>
                    <input type="password" name="password"  id="password" placeholder="••••••••" class="border border-gray-300 text-gray-900 sm:text-sm focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 " required>
                    @error('password') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block mb-2 text-base text-gray-500">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="border border-gray-300 text-gray-900 sm:text-sm focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 " required>
                    @error('password_confirmation') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                   
                <x-Button type="submit">
                    Register
                </x-Button>
                
                    <p class="text-base font-light text-gray-500 ">
                        Have an account ? <a href="/" class="font-medium text-primary-600 hover:underline ml-1">Sign in</a>
                    </p>
            </form>
                    
        </div>
    </div>
@endsection