<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <h1>Calculation</h1>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add Money</div>
            <div class="card-body">
                <form action="{{ route('cal') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="mymoney">Your Money</label>
                        <input type="text" class="form-control" name="mymoney">
                    </div>
                    @error('mymoney')
                    <div class="my-2">
                        <span class="text-danger my-2">{{$message}}</span>
                    </div>
                    @enderror
                    <br>
                    <input type="submit" value="Calculation" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
