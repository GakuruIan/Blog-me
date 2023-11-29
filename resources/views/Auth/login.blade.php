@extends('layouts.app')

@section('content')
    <div class="h-screen w-full flex items-center justify-center px-2 md:px-0">
        <div class="max-w-6xl">
            <header>
                <h1 class="text-4xl text-center mb-4">Welcome to Blog-Me</h1>
                <p class="text-xl font-medium text-center text-gray-500 mb-4">Sign in to Account</p>
            </header>
            {{-- form --}}
            <form class="space-y-4 md:space-y-6" method="POST" action="/login">
               @csrf
                <div>
                    <label for="email" class="block mb-2 text-base text-gray-500">Your email</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email" class="border border-gray-300 text-gray-900 sm:text-sm  focus:ring-indigo-600 focus:border-gray-600 block w-full p-2.5" placeholder="name@gmail.com" required>
                    @error('email') <span class="text-red-600 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label for="password" class="block mb-2 text-base text-gray-500">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="border border-gray-300 text-gray-900 sm:text-sm focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 " required>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                          <input id="remember" name="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded-sm focus:ring-3 focus:ring-primary-300">
                        </div>
                        <div class="ml-3 text-sm">
                          <label for="remember" class="text-gray-500">Remember me</label>
                        </div>
                    </div>
                    <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Forgot password?</a>
                </div>

                    <x-Button type="submit">
                        Sign in
                    </x-Button>
                
                    <p class="text-base font-light text-gray-500 ">
                        Don’t have an account yet? <a href="/register" class="font-medium text-primary-600 hover:underline ml-1">Sign up</a>
                    </p>
            </form>
        </div>
    </div>
@endsection