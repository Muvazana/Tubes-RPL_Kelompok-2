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
                            <div class="alert alert-success" role="alert">
                                {{ \Session::get('success') }}
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first() }}
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
                            <!-- <form id="form-data" method="post" enctype="multipart/form-data">
                                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    @csrf
                                    <div class="sm:col-span-5">
                                        <p class="block text-2xl font-medium text-gray-700"> Josep Herman </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="date" class="block text-sm font-medium text-gray-700"> Date of Birth </label>
                                        <p class="block text-lg font-medium text-gray-700"> 17-12-3005 </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="gender" class="block text-sm font-medium text-gray-700"> Gender </label>
                                        <p class="block text-lg font-medium text-gray-700"> Male </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="nik" class="block text-sm font-medium text-gray-700"> NIK </label>
                                        <p class="block text-lg font-medium text-gray-700"> 13131314015 </p>
                                    </div>
                                    <br>
                                    <div class="sm:col-span-5">
                                        <label class="block text-2xl font-medium text-gray-700"> Parents </label>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="father" class="block text-sm font-medium text-gray-700"> Father </label>
                                        <p class="block text-lg font-medium text-gray-700"> Mahdisk </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="nik_father" class="block text-sm font-medium text-gray-700"> NIK </label>
                                        <p class="block text-lg font-medium text-gray-700"> 13131314015 </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="mother" class="block text-sm font-medium text-gray-700"> Mother </label>
                                        <p class="block text-lg font-medium text-gray-700"> Mahdisk </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="nik_mother" class="block text-sm font-medium text-gray-700"> NIK </label>
                                        <p class="block text-lg font-medium text-gray-700"> 13131314015 </p>
                                    </div>
                                    <br>
                                    <div class="sm:col-span-5">
                                        <label class="block text-2xl font-medium text-gray-700"> Address </label>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="address" class="block text-sm font-medium text-gray-700"> Address </label>
                                        <p class="block text-lg font-medium text-gray-700"> Jl. bipbupbap no. 304 </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="optional_address" class="block text-sm font-medium text-gray-700"> Optional Address </label>
                                        <p class="block text-lg font-medium text-gray-700"> - </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="state" class="block text-sm font-medium text-gray-700"> State </label>
                                        <p class="block text-lg font-medium text-gray-700"> East Java </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="city" class="block text-sm font-medium text-gray-700"> City </label>
                                        <p class="block text-lg font-medium text-gray-700"> Malang </p>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="zip_code" class="block text-sm font-medium text-gray-700"> Zip </label>
                                        <p class="block text-lg font-medium text-gray-700"> 65199 </p>
                                    </div>
                                    <br>
                                    <div class="sm:col-span-5">
                                        <label class="block text-2xl font-medium text-gray-700"> Photo </label>
                                    </div>
                                    <img src="" alt="">
                                    <br>
                                    <div class="sm:col-span-5">
                                        <label class="block text-2xl font-medium text-gray-700"> Verification </label>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <select name="verification" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <option>Verified</option>
                                            <option>Unverified</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Done</button>
                                    </div>
                                </div>
                            </form> -->
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