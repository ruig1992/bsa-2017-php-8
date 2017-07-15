@extends('layouts.app')

@section('title', 'Main page')
@section('meta-description', 'Main page. BSA Task 5')

@section('content')
  <article>
    @component('components.page-header')
      @slot('header') Main page @endslot
      @slot('icon') fa-home @endslot
    @endcomponent

    <p class="text-center">
      <img src="{{ url('images/main.jpg') }}" alt="Main image">
    </p>
  </article>
@endsection
