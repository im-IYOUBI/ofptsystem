@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Edit Student</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('student.index') }}" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded hover:bg-gray-600 transition duration-300">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>
        
        <div class="table w-full mt-8 bg-white rounded shadow-md">
            <form action="{{ route('student.update', $student->id) }}" method="POST" class="w-full max-w-2xl px-8 py-10 mx-auto" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex justify-center mb-6">
                    <img class="w-20 h-20 sm:w-32 sm:h-32 rounded-full" src="{{ asset('images/profile/' . $student->user->profile_picture) }}" alt="avatar">
                </div>

                @php
                    $formFields = [
                        ['label' => 'Name', 'type' => 'text', 'name' => 'name', 'value' => $student->user->name],
                        ['label' => 'Email', 'type' => 'email', 'name' => 'email', 'value' => $student->user->email],
                        ['label' => 'Roll Number', 'type' => 'number', 'name' => 'roll_number', 'value' => $student->roll_number],
                        ['label' => 'Phone', 'type' => 'text', 'name' => 'phone', 'value' => $student->phone],
                        ['label' => 'Date of Birth', 'type' => 'text', 'name' => 'dateofbirth', 'value' => $student->dateofbirth, 'additional' => 'id="datepicker-se" autocomplete="off"']
                    ];
                @endphp

                @foreach($formFields as $field)
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="{{ $field['name'] }}">
                        {{ $field['label'] }}
                    </label>
                    <input name="{{ $field['name'] }}" class="w-full bg-gray-100 border border-gray-300 rounded py-2 px-4 text-gray-700 focus:outline-none focus:bg-white focus:border-blue-500 @error($field['name']) border-red-500 @enderror" type="{{ $field['type'] }}" value="{{ $field['value'] }}" {{ $field['additional'] ?? '' }}>
                    @error($field['name'])
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endforeach

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1">
                        Gender
                    </label>
                    <div class="flex flex-row items-center">
                        <label class="block text-gray-500 font-bold mr-4">
                            <input name="gender" class="mr-2 leading-tight" type="radio" value="male" {{ $student->gender == 'male' ? 'checked' : '' }}>
                            <span class="text-sm">Male</span>
                        </label>
                        <label class="block text-gray-500 font-bold mr-4">
                            <input name="gender" class="mr-2 leading-tight" type="radio" value="female" {{ $student->gender == 'female' ? 'checked' : '' }}>
                            <span class="text-sm">Female</span>
                        </label>
                        <label class="block text-gray-500 font-bold">
                            <input name="gender" class="mr-2 leading-tight" type="radio" value="other" {{ $student->gender == 'other' ? 'checked' : '' }}>
                            <span class="text-sm">Other</span>
                        </label>
                    </div>
                    @error('gender')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                @php
                    $selectFields = [
                        ['label' => 'Current Address', 'name' => 'current_address', 'value' => $student->current_address],
                        ['label' => 'Permanent Address', 'name' => 'permanent_address', 'value' => $student->permanent_address],
                        ['label' => 'Assign Class', 'name' => 'class_id', 'options' => $classes, 'optionLabel' => 'class_name'],
                        ['label' => 'Stagaire Parent', 'name' => 'parent_id', 'options' => $parents, 'optionLabel' => 'user.name']
                    ];
                @endphp

                @foreach($selectFields as $field)
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1">
                        {{ $field['label'] }}
                    </label>
                    <div class="relative">
                        @if(isset($field['options']))
                            <select name="{{ $field['name'] }}" class="block appearance-none w-full bg-gray-100 border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">--Select--</option>
                                @foreach ($field['options'] as $option)
                                    <option value="{{ $option->id }}" {{ $option->id == $student->{$field['name']} ? 'selected' : '' }}>
                                        {{ data_get($option, $field['optionLabel']) }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <input name="{{ $field['name'] }}" class="w-full bg-gray-100 border border-gray-300 rounded py-2 px-4 text-gray-700 focus:outline-none focus:bg-white focus:border-blue-500 @error($field['name']) border-red-500 @enderror" type="text" value="{{ $field['value'] }}">
                        @endif
                        @error($field['name'])
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endforeach

                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-1" for="profile_picture">
                        Picture
                    </label>
                    <input name="profile_picture" class="w-full bg-gray-100 border border-gray-300 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="file">
                </div>

                <div class="flex justify-end">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300" type="submit">
                        Update Stagaire
                    </button>
                </div>
            </form>        
        </div>
        
    </div>
@endsection

@push('scripts')
<script>
    $(function() {       
        $( "#datepicker-se" ).datepicker({ dateFormat: 'yy-mm-dd' });
    })
</script>
@endpush
