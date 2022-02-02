<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Upload Image</div>
            <div class="card-body">
                <form action="{{route('addimage')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="image_name">Image</label>
                            <input type="file" class="form-control" name="image_name">
                        </div>
                        @error('service_image')
                        <div class="my-2">
                            <span class="text-danger my-2">{{$message}}</span>
                        </div>
                            @enderror
                    <br>
                    <input type="submit" value="Upload" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
