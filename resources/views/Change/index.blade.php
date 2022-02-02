<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <h1>Change System</h1>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add Money</div>
            <div class="card-body">
                <form action="{{ route('changecal') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="money">Amount</label>
                        <input type="number" class="form-control" name="money">
                    </div>
                    @error('money')
                    <div class="my-2">
                        <span class="text-danger my-2">{{$message}}</span>
                    </div>
                    @enderror
                    <br>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    @error('price')
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
    @if(isset($change))
    <p>{{dd($change)}}</p>
    <h1>Result</h1>
    <div class="col-md-8">
        <div class="card">
            @foreach ($change as $c)
                <h2>แบงค์ {{$c[0]}} จำนวน {{ $c[1] }} ใบ</h2>
            @endforeach

        </div>
    </div>
    @endif
</x-app-layout>
