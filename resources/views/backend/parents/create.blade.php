@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Add New Parents</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('parents.index') }}" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded hover:bg-gray-600 transition duration-300">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>
        
        <div class="table w-full mt-8 bg-white rounded shadow-md">
            <form action="{{ route('parents.store') }}" method="POST" class="w-full max-w-xl px-8 py-10 mx-auto" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="name">
                        Name
                    </label>
                    <input name="name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="email">
                        Email
                    </label>
                    <input name="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="password">
                        Password
                    </label>
                    <input name="password" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="password">
                    @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="phone">
                        Phone
                    </label>
                    <input name="phone" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" value="{{ old('phone') }}">
                    @error('phone')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1">
                        Gender
                    </label>
                    <div class="flex flex-row items-center">
                        <label class="block text-gray-500 font-bold">
                            <input name="gender" class="mr-2 leading-tight" type="radio" value="male">
                            <span class="text-sm">Male</span>
                        </label>
                        <label class="ml-4 block text-gray-500 font-bold">
                            <input name="gender" class="mr-2 leading-tight" type="radio" value="female">
                            <span class="text-sm">Female</span>
                        </label>
                        <label class="ml-4 block text-gray-500 font-bold">
                            <input name="gender" class="mr-2 leading-tight" type="radio" value="other">
                            <span class="text-sm">Other</span>
                        </label>
                    </div>
                    @error('gender')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="current_address">
                        Current Address
                    </label>
                    <input name="current_address" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" value="{{ old('current_address') }}">
                    @error('current_address')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="permanent_address">
                        Permanent Address
                    </label>
                    <input name="permanent_address" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" value="{{ old('permanent_address') }}">
                    @error('permanent_address')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="profile_picture">
                        Picture
                    </label>
                    <input name="profile_picture" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="file">
                </div>

                <div class="flex justify-end">
                    <button class="shadow bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300" type="submit">
                        Submit
                    </button>
                </div>
            </form>        
        </div>
        
    </div>
@endsection
