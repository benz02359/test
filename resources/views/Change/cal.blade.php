<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <h1>Result</h1>
    <div class="col-md-8">
        <div class="card">
            @foreach ($change as $c)
                <h2>{{$c[0]}} จำนวน {{ $c[1] }} {{ $c[2] }}</h2>
            @endforeach

        </div>
    </div>
</x-app-layout>
