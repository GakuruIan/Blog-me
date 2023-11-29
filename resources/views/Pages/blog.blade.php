@extends('layouts.app')

@section('content')
    <div>
       <x-Navbar/>
       <x-Blog :blog="$Blog"/>
    </div>

@endsection
