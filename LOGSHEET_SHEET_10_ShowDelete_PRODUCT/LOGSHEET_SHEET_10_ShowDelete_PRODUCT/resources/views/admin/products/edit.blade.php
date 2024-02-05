@extends('layouts.adminDashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    </head>

    <body>



        <x-validation-errors class="mb-4" />
        <div className="p-4">
            <form class="row g-3 p-10 m-10" method="POST" action="{{ route('admin.editProduct', $product->id) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                    <label for="foodName" class="form-label">Food Name</label>
                    <input type="text" class="form-control" id="foodName" name="food_name"
                        value='{{$product->food_name}}'>
                </div>
                <div class="col-6">
                    <label for="ingredients" class="form-label">Ingredients</label>
                    <input type="text" class="form-control" id="ingredients" placeholder="" name="ingredients"
                        value='{{$product->ingredients}}'>
                </div>
                <div class="col-md-12">
                    <label for="foodDescription" class="form-label">Description</label>
                    <input type="text" class="form-control" id="foodDescription" name="food_descriptions"
                        value='{{$product->food_descriptions}}'>
                </div>

                <div class="col-12">
                    <label for="foodImage" class="form-label">Food Image</label>
                    <input type="file" class="form-control" id="foodImage" name="food_image">

                    @if($product->food_image)
                    <img src="{{ url('products/'.$product->food_image) }}" alt="Current Image"
                        style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>

                <div class="col-md-4">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category_tag"
                        value='{{$product->food_category}}'>
                </div>
                <div class="col-md-2">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="food_price"
                        value='{{$product->food_price}}'>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">Status</label>
                    <select id="inputState" class="form-select" name="is_available" value='{{$product->is_available}}'>
                        <option value="true" selected>Avialable</option>
                        <option value="false">Not Avialable</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="avialableQuantity" class="form-label">Available Quantity</label>
                    <input type="text" class="form-control" id="avialableQuantity" name="quantity_available"
                        value='{{$product->quantity_available}}'>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-lg"
                        style="background-color: #007bff; border-color: #007bff;">Update Food Item</button>
                </div>

            </form>

        </div>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
            </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])


    </body>

</html>
@endsection