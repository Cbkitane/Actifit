@extends('layouts.app', ['page_title' => 'User Details'])

@section('content')
{{-- <a href="{{ route('admin.back') }}">Back</a> --}}
<livewire:view-user />
@endsection