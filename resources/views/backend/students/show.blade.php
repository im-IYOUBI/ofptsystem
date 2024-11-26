@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-gray-700 uppercase font-bold">Stagaires Details</h2>
            <a href="{{ route('student.index') }}" class="bg-gray-700 text-white text-sm uppercase py-2 px-4 flex items-center rounded">
                <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path>
                </svg>
                <span class="ml-2 text-xs font-semibold">Back</span>
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="space-y-6">
            <div class="text-center">
                <img class="w-32 h-32 rounded-full mx-auto border-4 border-gray-200" src="{{ asset('images/profile/' .$student->user->profile_picture) }}" alt="avatar">
            </div>
            <div class="space-y-4">
                @foreach([
                    'Name' => $student->user->name,
                    'Email' => $student->user->email,
                    'Roll' => $student->roll_number,
                    'Phone' => $student->phone,
                    'Gender' => $student->gender,
                    'Date of Birth' => $student->dateofbirth,
                    'Current Address' => $student->current_address,
                    'Permanent Address' => $student->permanent_address,
                    'Class' => $student->class->class_name,
                    'Parent' => $student->parent->user->name,
                    'Parent\'s Email' => $student->parent->user->email,
                    'Parent\'s Phone' => $student->parent->phone,
                    'Parent\'s Address' => $student->parent->current_address
                ] as $label => $value)
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-bold text-gray-700">{{ $label }}:</span>
                        <span class="text-gray-600">{{ $value }}</span>
                    </div>
                @endforeach
            </div>
        </div>
                <div class="space-y-6">
                    <div class="bg-gray-100 rounded-lg p-4">
                        <div class="flex items-center justify-between bg-gray-600 rounded-t-lg text-white p-2">
                            <div class="w-1/3">Code</div>
                            <div class="w-1/3">Subject</div>
                            <div class="w-1/3 text-right">Trainer</div>
                        </div>
                        @foreach ($class->subjects as $subject)
                            <div class="flex items-center justify-between border-b border-gray-200 py-2 px-2">
                                <div class="w-1/3 text-gray-600">{{ $subject->subject_code }}</div>
                                <div class="w-1/3 text-gray-600">{{ $subject->name }}</div>
                                <div class="w-1/3 text-gray-600 text-right">{{ $subject->teacher->user->name }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
