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
                        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-4">
                            <div class="grid grid-cols-4 gap-4">
                                @for ($i = 0; $i < 4; $i++) <!-- This example requires Tailwind CSS v2.0+ -->
                                    <div class="bg-white overflow-hidden shadow rounded-lg">
                                        <div class="px-4 py-2">
                                            <!-- Content goes here -->
                                            <p>Jumlah Users</p>
                                        </div>
                                        <div class="px-4 py-7">
                                            <!-- Content goes here -->
                                            <p class="text-2xl">123 User</p>
                                        </div>
                                    </div>
                                    @endfor
                            </div>
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