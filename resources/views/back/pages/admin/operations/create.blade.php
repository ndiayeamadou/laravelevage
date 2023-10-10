@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Création de semences')

@section('content')
    @livewire('in.semence-create-comp')
@endsection
