<!doctype html>
<html>

<head>
    @include('head')
</head>

<body>
    @include('user.navbar')
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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Immunization</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i < 3; $i++) <tr class="bg-white border-collapse">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">12-12-2222</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Khonsu</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">true</td>
                                </tr>
                                @endfor
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