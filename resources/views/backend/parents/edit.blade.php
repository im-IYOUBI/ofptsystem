@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Edit Parent</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('parents.index') }}" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded hover:bg-gray-600 transition duration-300">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>
        
        <div class="table w-full mt-8 bg-white rounded shadow-md">
            <form action="{{ route('parents.update', $parent->id) }}" method="POST" class="w-full max-w-2xl px-8 py-10 mx-auto" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex justify-center mb-6">
                    <img class="w-20 h-20 sm:w-32 sm:h-32 rounded-full" src="{{ asset('images/profile/' . $parent->user->profile_picture) }}" alt="avatar">
                </div>

                @php
                    $formFields = [
                        ['label' => 'Name', 'type' => 'text', 'name' => 'name', 'value' => $parent->user->name],
                        ['label' => 'Email', 'type' => 'email', 'name' => 'email', 'value' => $parent->user->email],
                        ['label' => 'Phone', 'type' => 'text', 'name' => 'phone', 'value' => $parent->phone],
                        ['label' => 'Current Address', 'type' => 'text', 'name' => 'current_address', 'value' => $parent->current_address],
                        ['label' => 'Permanent Address', 'type' => 'text', 'name' => 'permanent_address', 'value' => $parent->permanent_address],
                    ];
                @endphp

                @foreach($formFields as $field)
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="{{ $field['name'] }}">
                        {{ $field['label'] }}
                    </label>
                    <input name="{{ $field['name'] }}" class="w-full bg-gray-100 border border-gray-300 rounded py-2 px-4 text-gray-700 focus:outline-none focus:bg-white focus:border-blue-500 @error($field['name']) border-red-500 @enderror" type="{{ $field['type'] }}" value="{{ $field['value'] }}">
                    @error($field['name'])
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endforeach

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1">
                        Gender
                    </label>
                    <div class="flex items-center">
                        <label class="mr-4 flex items-center text-gray-700 font-bold">
                            <input name="gender" class="mr-2 leading-tight" type="radio" value="male" {{ $parent->gender == 'male' ? 'checked' : '' }}>
                            <span class="text-sm">Male</span>
                        </label>
                        <label class="mr-4 flex items-center text-gray-700 font-bold">
                            <input name="gender" class="mr-2 leading-tight" type="radio" value="female" {{ $parent->gender == 'female' ? 'checked' : '' }}>
                            <span class="text-sm">Female</span>
                        </label>
                        <label class="flex items-center text-gray-700 font-bold">
                            <input name="gender" class="mr-2 leading-tight" type="radio" value="other" {{ $parent->gender == 'other' ? 'checked' : '' }}>
                            <span class="text-sm">Other</span>
                        </label>
                    </div>
                    @error('gender')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="profile_picture">
                        Picture
                    </label>
                    <input name="profile_picture" class="w-full bg-gray-100 border border-gray-300 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="file">
                </div>

                <div class="flex justify-end">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300" type="submit">
                        Update Parent
                    </button>
                </div>
            </form>        
        </div>
        
    </div>
@endsection
