@extends('layouts.app')

@section('content')

<div>
    <x-Navbar/>
    <x-Blogs :blogs="$Blogs"/>
 </div>
    
@endsection


