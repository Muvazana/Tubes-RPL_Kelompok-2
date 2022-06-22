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
                <h1 class="text-2xl font-semibold text-gray-900">Schedule</h1>
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
                    <form action="{{ url('/member/schedule/addAction') }}" id="form-data" method="post" enctype="multipart/form-data">
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            @csrf
                            <div class="sm:col-span-5">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Date
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input datepicker name="vaksination_date" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm pl-10 p-2.5" placeholder="Select date">
                                </div>
                            </div>
                            <div class="sm:col-span-5">
                                <label for="vaksin_location_id" class="block text-sm font-medium text-gray-700"> Location
                                </label>
                                <select name="vaksin_location_id" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($locations as $item)
                                        <option value="{{ $item->id }}">2.3km - {{ $item->address }}</option>
                                    @endforeach
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
    @include('body')
</body>

</html>