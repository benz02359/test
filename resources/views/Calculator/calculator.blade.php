<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <h1>Change Management</h1>
    <div class="col-md-8">
        <div class="card">
            <h2>{{ implode("\n",($arr))}}</h2>
        </div>
    </div>
</x-app-layout>
