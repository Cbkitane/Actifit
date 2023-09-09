@extends('layouts.app', ['page_title' => 'Admin Dashboard'])

@section('content')
{{-- <h2>Welcome Admin</h2> --}}
<div class="flex flex-wrap gap-2 justify-evenly">
        <div class="card border-2 border-black rounded-lg w-1/5 h-32 my-5 flex items-center justify-center">
                Users: <span class="font-bold text-2xl ml-5">{{ $usersCount }} </span>
        </div>
        <div class="card border-2 border-black rounded-lg w-1/5 h-32 my-5 flex items-center justify-center">
                Admins: <span class="font-bold text-2xl ml-5">{{ $adminsCount }} </span>
        </div>
        <div class="card border-2 border-black rounded-lg w-1/5 h-32 my-5 flex items-center justify-center">
                Trainers: <span class="font-bold text-2xl ml-5">{{ $trainersCount }} </span>
        </div>
        <div class="card border-2 border-black rounded-lg w-1/5 h-32 my-5 flex items-center justify-center">
                Staff: <span class="font-bold text-2xl ml-5">{{ $staffCount }} </span>
        </div>
        <div class="card border-2 border-black rounded-lg w-1/5 h-32 my-5 flex items-center justify-center">
                Members: <span class="font-bold text-2xl ml-5">{{ $membersCount }} </span>
        </div>
</div>


@endsection