@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>
{{--
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Other profile fields -->

            <div class="mb-3 position-relative">
                <label for="profile_photo" class="form-label"><img  src="../assets/images/avatars/01.png" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded position-absolute top-50 end-0"></label>
                <input type="file" class="form-control" id="profile_photo" name="profile_photo">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form> --}}
        {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form') --}}
            </div>
        </div>
    </div>
</div>

@endsection
