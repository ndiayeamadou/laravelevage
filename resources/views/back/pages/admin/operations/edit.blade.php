@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Suivi de l\'opération')

@section('content')
    @livewire('in.semence-create-comp', ['operation'])
@endsection
