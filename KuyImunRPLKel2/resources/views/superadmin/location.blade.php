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
                        <div class="flex justify-end pt-3">
                            <a href="/superadmin/location/add" class="rounded text-white bg-blue-600 px-4 py-2 m-4 mr-0">Add Location</a>
                        </div>
                        <!-- Replace with your content -->
                        <div class="py-4">
                            <!-- table -->
                            <table id="table_id" class="divide-y divide-gray-200 w-full shadow-xl table-auto rounded-lg bg-slate-100">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Address</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Administrator</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Latitude</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Longitude</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-collapse">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rumah Sakit 1</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">5</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1.12521</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2.32145</td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3 w-10">
                                            <a href="" class="px-5 py-2 bg-blue-500 rounded-md text-white" >Edit</a>
                                            <button class="px-5 py-2 bg-red-500 rounded-md text-white" data-id="">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- end of table -->
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