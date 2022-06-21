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
                        <h1 class="text-2xl font-semibold text-gray-900">Location</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-4">                            
                            <form action="" id="form-data" method="post" enctype="multipart/form-data">
                                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    @csrf
                                    <div class="sm:col-span-5">
                                        <label for="address" class="block text-sm font-medium text-gray-700"> Address
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" value="{{isset($data) ? $data->user_admins->address : ''}}" name="address" id="address" autocomplete="address" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>                                    
                                    <div class="sm:col-span-5">
                                        <label for="longitude" class="block text-sm font-medium text-gray-700"> Longitude
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" value="{{isset($data) ? $data->longitude : ''}}" name="longitude" id="longitude" autocomplete="longitude" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-5">
                                        <label for="latitude" class="block text-sm font-medium text-gray-700"> Latitude
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" value="{{isset($data) ? $data->latitude : ''}}" name="latitude" id="latitude" autocomplete="latitude" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded sm:text-sm border-gray-300">
                                        </div>
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