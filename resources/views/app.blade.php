@extends('layouts.app')

@section('content')
    <router-view></router-view>
    {{-- <router-link to="/" exact>Home</router-link>
    <router-link :to="{ name: 'about' }">About</router-link> --}}
@endsection
