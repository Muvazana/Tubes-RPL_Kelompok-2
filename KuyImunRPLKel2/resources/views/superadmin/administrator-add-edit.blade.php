<!doctype html>
<html>

<head>
    @include('head')
</head>

<body class="h-full">
    <div>
        <!-- Static sidebar for desktop -->
        @include('superadmin.sidebar')
        <div class="md:pl-64 flex flex-col flex-1">
            @include('superadmin.header')
            <main>
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">{{$title}}</h1>
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
                            <form action="{{ url($url) }}" id="form-data" method="post" enctype="multipart/form-data">
                                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    @csrf
                                    <div class="sm:col-span-5">
                                        <label for="name" class="block text-sm font-medium text-gray-700"> Full Name
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" value="{{isset($data) ? $data->user_admins->name : ''}}" name="name" id="name" autocomplete="name" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="username" class="block text-sm font-medium text-gray-700"> Username
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" value="{{isset($data) ? $data->username : ''}}" name="username" id="username" autocomplete="username" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="password" class="block text-sm font-medium text-gray-700"> Password
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="password" name="password" id="password" autocomplete="password" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="email" class="block text-sm font-medium text-gray-700"> Email
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="email" value="{{isset($data) ? $data->email : ''}}" name="email" id="email" autocomplete="email" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="vaksin_location_id" class="block text-sm font-medium text-gray-700"> Location
                                        </label>
                                        <select name="location" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <option>Location 1</option>
                                            <option>Location 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pt-5">
                                    <div class="flex justify-end">
                                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Done</button>
                                    </div>
                                </div>
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