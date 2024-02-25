@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>
<p>Available Rooms: {{ $dashboard['available_rooms'] }}</p>
<p>Reserved Rooms: {{ $dashboard['reserved_rooms'] }}</p>
@endsection