@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Gestion des Dépenses')

@section('content')
    @livewire('in.fee-comp')
@endsection
