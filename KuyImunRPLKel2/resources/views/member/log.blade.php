<!doctype html>
<html>

<head>
    @include('head')
</head>

<body>
    @include('member.navbar')
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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Vaccine</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Location</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Immunization</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data) == 0)
                                <tr class="bg-white border-collapse">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan= "5"><center>No Data</center></td>
                                </tr>
                            @endif
                            @foreach ($data as $item)
                                <tr class="bg-white border-collapse">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->vaksination_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ empty($item->data_vaksin_id) ? '-': $item->data_vaksins->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->vaksin_locations->address }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end of table -->
                </div>
                <!-- /End replace -->
            </div>
        </div>
    </main>
    @include('body')
</body>

</html>