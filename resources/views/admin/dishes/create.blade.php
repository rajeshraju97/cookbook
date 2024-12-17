@extends('layouts.admin')
@section('title', 'Dishes Create')
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
                    <a href="#">Create</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Dish</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data"
                            class="form-group">
                            @csrf
                            <div class="mb-3">
                                <label for="dishName" class="form-label">Dish Type</label>
                                <select class="form-select form-control" name="dish_type_id">
                                    <option value="">Select Dish Type</option>
                                    @foreach($dish_types as $type)
                                        <option value="{{$type->id}}">{{$type->type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Dish Name -->
                            <div class="mb-3">
                                <label for="dishName" class="form-label">Dish Name</label>
                                <input type="text" name="dish_name" id="dishName" class="form-control"
                                    placeholder="e.g., Chicken Biryani" required value="{{old('dish_name')}}">
                            </div>

                            <!-- Dish Image -->
                            <div class="mb-3">
                                <label for="dishImage" class="form-label">Dish Image</label>
                                <input type="file" name="dish_image" id="dishImage" class="form-control"
                                    accept=".png,.jpg,.gif,.webp,.jpeg" required value="{{old('dish_image')}}">
                                <span class="text-danger">* You can only upload png, jpg, jpeg.Max 2MB Files</span>
                            </div>

                            <div class="mb-3">
                                <label for="dishName" class="form-label">Dish Description</label>
                                <textarea type="text" name="dish_description" id="dishName" class="form-control"
                                    placeholder="e.g., Chicken Biryani" required>{{old('dish_description')}}</textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save Dish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection