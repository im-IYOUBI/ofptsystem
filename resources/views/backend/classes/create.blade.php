@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Add New Class</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('classes.index') }}" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded hover:bg-gray-600 transition duration-300">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>
        
        <div class="table w-full mt-8 bg-white rounded shadow-md">
            <form action="{{ route('classes.store') }}" method="POST" class="w-full max-w-2xl px-8 py-10 mx-auto">
                @csrf
                @php
                    $formFields = [
                        ['label' => 'Class Name', 'type' => 'text', 'name' => 'class_name', 'value' => old('class_name')],
                        ['label' => 'Class Numeric', 'type' => 'number', 'name' => 'class_numeric', 'value' => old('class_numeric')],
                        ['label' => 'Class Description', 'type' => 'text', 'name' => 'class_description', 'value' => old('class_description')],
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
                        Assign Teacher
                    </label>
                    <div class="relative">
                        <select name="teacher_id" class="block appearance-none w-full bg-gray-100 border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option value="">--Select Teacher--</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    @error('teacher_id')
                        <p class="text-red-500 text-xs font-normal italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300" type="submit">
                        Submit
                    </button>
                </div>
            </form>        
        </div>
        
    </div>
@endsection
