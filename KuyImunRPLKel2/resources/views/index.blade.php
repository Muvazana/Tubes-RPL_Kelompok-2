<!doctype html>
<html>

<head>
    @include('head')
</head>

<body>
    @include('navbar')

    <div class="grid grid-cols-12 py-16">
        <div class="col-start-2 col-end-5">
            <p class="text-6xl text-red-400">Let We Take Care Your Health</p>
        </div>
        <div class="col-start-5 col-end-12 row-span-2 flex justify-center items-center">
            <img src="{{ asset('assets/undraw_medical_care_movn.svg') }}" alt="">
        </div>
        <div class="col-start-2 col-end-5 indent-6 space-y-4 mt-4">
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea t</p>
        </div>
        <div>

        </div>
    </div>
    @include('body')
</body>

</html>