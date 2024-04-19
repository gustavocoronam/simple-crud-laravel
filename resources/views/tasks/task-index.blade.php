@extends('layout.layout')

@section('content')

    <div class="card shadow-sm border-light p-3 mt-2">
        
        @include('components.alert-success')
        @include('components.alert-error')

        @include('tasks.task-form')

        @include('tasks.task-details')

        @include('tasks.task-list')

    </div>

@endsection
