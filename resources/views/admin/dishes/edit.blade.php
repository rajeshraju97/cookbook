@extends('layouts.admin')
@section('title', 'Dishes Edit')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Dishes</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Dishes</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Dish</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.dishes.update', $dish->id) }}"
                            enctype="multipart/form-data" class="form-group">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="dishName" class="form-label">Dish Name</label>
                                <select class="form-select form-control" name="dish_type_id">
                                    <option value="{{$dish->dish_type_id}}">{{$dish->dishType->type_name}}</option>
                                    @foreach($dish_types as $type)
                                        <option value="{{$type->id}}">{{$type->type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Dish Name -->
                            <div class="mb-3">
                                <label for="dishName" class="form-label">Dish Name</label>
                                <input type="text" name="dish_name" id="dishName" class="form-control"
                                    placeholder="e.g., Chicken Biryani" value="{{$dish->dish_name}}">
                            </div>
                            <p>Previous Dish Image:</p>
                            <img src="{{ asset('dishes_images/' . $dish->dish_image)}}" alt="Dish Image" width="200"
                                height="200">

                            <!-- Dish Image -->
                            <div class="mb-3">
                                <label for="dishImage" class="form-label">Dish Image</label>
                                <input type="file" name="dish_image" id="dishImage" class="form-control"
                                    accept=".png,.jpg,.gif,.webp,.jpeg">
                                <span class="text-danger">* You can only upload png, jpg, jpeg.Max 2MB Files</span>
                            </div>

                            <div class="mb-3">
                                <label for="dishName" class="form-label">Dish Description</label>
                                <textarea type="text" name="dish_description" id="dishName" class="form-control"
                                    placeholder="e.g., Chicken Biryani">{{$dish->dish_description}}</textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update Dish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection