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
                        <h1 class="text-2xl font-semibold text-gray-900">Patient</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-4">
                            <!-- table -->
                            <table id="table_id" class="divide-y divide-gray-200 w-full shadow-xl table-auto rounded-lg bg-slate-100">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Full Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Date of Birth</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Gender</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Father</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Mother</th>
                                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) == 0)
                                        <tr class="bg-white border-collapse">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan= "5"><center>No Data</center></td>
                                        </tr>
                                    @endif
                                    @foreach ($data as $user) 
                                        <tr class="bg-white border-collapse">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->user_members->child_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->user_members->child_birth_date }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->user_members->child_gender == 'laki_laki' ? 'Laki-Laki':'Perempuan' }}</td>
                                            @foreach($user->user_members->parents_information as $parent)
                                                @if($parent->parent_type == "father")
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $parent->name }}</td>
                                                @endif
                                            @endforeach
                                            @foreach($user->user_members->parents_information as $parent)
                                                @if($parent->parent_type == "mother")
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $parent->name }}</td>
                                                @endif
                                            @endforeach
                                            {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3 w-10">
                                                <a href="" class="px-5 py-2 bg-blue-500 rounded-md text-white">Edit</a>
                                                <button class="px-5 py-2 bg-red-500 rounded-md text-white" data-id="">Delete</button>
                                            </td> --}}
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
        </div>
    </div>
    @include('body')
</body>

</html>