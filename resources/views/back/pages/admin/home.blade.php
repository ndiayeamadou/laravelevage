@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Accueil')

@section('content')
    @livewire('in.semence-comp')
@endsection
