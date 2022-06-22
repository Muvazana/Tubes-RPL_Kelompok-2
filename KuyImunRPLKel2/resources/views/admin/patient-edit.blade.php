<!doctype html>
<html>

<head>
    @include('head')
</head>

<body class="h-full">
    <div>
        <!-- Static sidebar for desktop -->
        @include('admin.sidebar')
        <div class="md:pl-64 flex flex-col flex-1">
            @include('admin.header')
            <main>
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">
                            Edit Patient
                        </h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-4">
                            @if (\Session::has('success'))
                            <div class="rounded-md bg-green-50 p-4 mb-5">
                                <div class="flex alert-del">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: solid/check-circle -->
                                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800">{{ \Session::get('success') }}</p>
                                    </div>
                                    <div class="ml-auto pl-3">
                                        <div class="-mx-1.5 -my-1.5">
                                            <button type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                                                <span class="sr-only">Dismiss</span>
                                                <!-- Heroicon name: solid/x -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="rounded-md bg-red-50 p-4 mb-5">
                                <div class="flex alert-del">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: solid/check-circle -->
                                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-800">{{ $errors->first() }}</p>
                                    </div>
                                    <div class="ml-auto pl-3">
                                        <div class="-mx-1.5 -my-1.5">
                                            <button type="button" class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600">
                                                <span class="sr-only">Dismiss</span>
                                                <!-- Heroicon name: solid/x -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <form action="{{ (isset($data) && $data->user_members->status == "verified") ? '' : url('/admin/patient/editAction/'.$data->id)  }}" id="form-data" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Patient Information</h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details.</p>
                                    </div>
                                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $data->user_members->child_name }}</dd>
                                            </div>
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">NIK</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $data->user_members->nik }}</dd>
                                            </div>
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">Birth Date</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $data->user_members->child_birth_date }}</dd>
                                            </div>
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $data->user_members->child_gender == 'laki_laki' ? 'Laki-Laki':'Perempuan' }}</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                <!-- parent -->
                                <br>
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Parents Information</h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Patient parents details.</p>
                                    </div>
                                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                            @foreach($data->user_members->parents_information as $parent)
                                            @if($parent->parent_type == "father")
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">Father</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $parent->name }}</dd>
                                            </div>
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">NIK</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $parent->nik }}</dd>
                                            </div>
                                            @endif
                                            @endforeach
                                            @foreach($data->user_members->parents_information as $parent)
                                            @if($parent->parent_type == "mother")
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">Mother</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $parent->name }}</dd>
                                            </div>
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">NIK</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $parent->nik }}</dd>
                                            </div>
                                            @endif
                                            @endforeach
                                            <div class="sm:col-span-2">
                                                <dt class="text-sm font-medium text-gray-500">Phone Number</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $data->user_members->phone_number }}</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                <!-- address -->
                                <br>
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Address Information</h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Patient address details.</p>
                                    </div>
                                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                            <div class="sm:col-span-2">
                                                <dt class="text-sm font-medium text-gray-500">Address</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $data->user_members->phone_number }}</dd>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <dt class="text-sm font-medium text-gray-500">Optional Address</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ empty($data->user_members->optional_address) ? '-': $data->user_members->optional_address }}</dd>
                                            </div>
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">State</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $data->user_members->state }}</dd>
                                            </div>
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">City</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $data->user_members->city }}</dd>
                                            </div>
                                            <div class="sm:col-span-1">
                                                <dt class="text-sm font-medium text-gray-500">Zip Code</dt>
                                                <dd class="mt-1 text-sm text-gray-900">{{ $data->user_members->zip_code }}</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                <!-- document -->
                                <br>
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Document Information</h3>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Patient document details.</p>
                                    </div>
                                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                            <div class="sm:col-span-2">
                                                <dt class="text-sm font-medium text-gray-500">File</dt>
                                                <dd class="mt-1 text-sm text-gray-900"> Image </dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                <!-- verification -->
                                <br>
                                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Verification</h3>
                                    </div>
                                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                            <div class="sm:col-span-1">
                                                <select name="status" {{(isset($data) && $data->user_members->status == "verified") ? 'disabled=true' : ''}} class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                    <option {{(isset($data) && $data->user_members->status == "verified") ? 'selected' : ''}} value="verified">Verified</option>
                                                    <option {{(isset($data) && $data->user_members->status != "verified") ? 'selected' : ''}} value="not_verified">Unverified</option>
                                                </select>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                                @if((isset($data) && $data->user_members->status != "verified"))
                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Done</button>
                                    </div>
                                </div>
                                @endif
                            </form>

                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </main>
        </div>
    </div>
    @include('body')
</body>

</html>