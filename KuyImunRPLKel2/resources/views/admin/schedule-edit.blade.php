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
                        <h1 class="text-2xl font-semibold text-gray-900">Schedule</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <form action="" id="form-data" method="post" enctype="multipart/form-data">
                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                @csrf
                                <div class="sm:col-span-5">
                                    <p class="block text-2xl font-medium text-gray-700"> Josep Herman </p>
                                </div>
                                <div class="sm:col-span-5">
                                    <label for="date" class="block text-sm font-medium text-gray-700"> Date </label>
                                    <p class="block text-lg font-medium text-gray-700"> 01-07-2022 </p>
                                </div>
                                <div class="sm:col-span-5">
                                    <label for="vaccine" class="block text-sm font-medium text-gray-700"> Vaccine
                                    </label>
                                    <select name="vaccine" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option>Vaccine 1</option>
                                        <option>Vaccine 2</option>
                                        <option>Vaccine 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Done</button>
                                </div>
                            </div>
                        </form>
                        <!-- /End replace -->
                    </div>
                </div>
            </main>
        </div>
    </div>
    @include('body')
</body>

</html>