@extends('back.layouts.pages-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Type d\'opération')

@section('content')
    @livewire('in.operation-type-comp')
@endsection
