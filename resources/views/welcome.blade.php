@extends('layout.main')
@section('title','Finança')
@section('content')

<section class="flex w-full space-x-4 p-1 h-screen">

    @include('financas.users')
  

    @include('financas.controle')
    @include('financas.relatorio')



</section>

@endsection
