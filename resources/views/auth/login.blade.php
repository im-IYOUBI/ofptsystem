@extends('layouts.frontend')

@section('content')
{{-- message --}}

<div class="w-full max-w-md mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
        
        <h2 class="text-xl font-semibold mb-6">Sign in</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group mb-4">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email<span class="text-red-500">*</span></label>
                <input type="email" class="form-control shadow appearance-none border @error('email') is-invalid @enderror rounded-lg w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="email" id="email">
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <span class="profile-views"><i class="fas fa-envelope text-gray-400"></i></span>
            </div>
            <div class="form-group mb-4 relative">
                <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password <span class="text-red-500">*</span></label>
                <input type="password" class="form-control pass-input shadow appearance-none border @error('password') is-invalid @enderror rounded-lg w-full py-2 px-3 text-gray-900 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="password" id="password">
                <span class="profile-views feather-eye toggle-password cursor-pointer absolute right-3 top-10 text-gray-400"></span>
                @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2 leading-tight" {{ old('remember') ? 'checked' : '' }}>
                    <span class="text-sm text-gray-600">Remember me</span>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" type="submit">Login</button>
            </div>
        </form>

        
    </div>
</div>

@endsection
