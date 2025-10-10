@extends('layouts.app')
@section('title', '単語登録')
@section('header')
@include('layouts.header')
@endsection
@section('content')

<div class="container" style="margin-top: 50px;">
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-6 bg-white shadow sm:rounded-lg">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="p-6 bg-white shadow sm:rounded-lg">
                @include('profile.partials.update-password-form')
            </div>

            <div class="p-6 bg-white shadow sm:rounded-lg">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</div>
@endsection