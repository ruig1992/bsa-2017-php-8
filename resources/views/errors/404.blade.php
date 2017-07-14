@extends('layouts.app')

@section('title', 'Cars. Error 404')

@section('content')
  @component('components.alert')
    @slot('errorCode') 404 @endslot
    {{ $message }}
  @endcomponent
@endsection
