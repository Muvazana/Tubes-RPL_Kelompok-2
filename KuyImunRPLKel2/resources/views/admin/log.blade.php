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
                        <h1 class="text-2xl font-semibold text-gray-900">Log</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-4">
                            <!-- table -->
                            <table id="table_id" class="divide-y divide-gray-200 w-full shadow-xl table-auto rounded-lg bg-slate-100">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Full Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Vaccine Schedule</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Vaccine</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Address</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Immunization Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Account Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) == 0)
                                        <tr class="bg-white border-collapse">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan= "6"><center>No Data</center></td>
                                        </tr>
                                    @endif
                                    @foreach ($data as $item)
                                        <tr class="bg-white border-collapse">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->user_members->child_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->vaksination_date }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ empty($item->data_vaksin_id) ? '-': $item->data_vaksins->name}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->user_members->address }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->status }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->user_members->status == "verified" ? "Verified" : "Not Verified" }}</td>
                                        </tr>
                                    @endforeach
                                    {{-- @for ($i = 1; $i < 3; $i++) <tr class="bg-white border-collapse">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Steven Grant</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">12-12-2222</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Khonsu</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rumah Sakit Silent Hill</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">true</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3 w-10">
                                            <a href="" class="px-5 py-2 bg-blue-500 rounded-md text-white">Edit</a>
                                            <button class="px-5 py-2 bg-red-500 rounded-md text-white" data-id="">Delete</button>
                                        </td>
                                        </tr>
                                        @endfor --}}
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