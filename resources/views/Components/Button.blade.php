<button {{ $attributes->merge(['type' => 'button']) }} 
    class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium  text-base px-5 py-2.5 text-center">
   {{$slot}}
</button>