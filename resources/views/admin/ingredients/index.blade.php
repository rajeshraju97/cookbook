@extends('layouts.admin')
@section('title', 'Ingredients List')
@section('content')



<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Ingredients</h3>
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
                    <a href="#">Ingredients</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">All Ingredients</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">All Ingredients</h4>

                            <button class="btn btn-primary btn-round ms-auto" id="openCreate" type="button">
                                <i class="fa fa-plus"></i>
                                Add Ingredients
                            </button>


                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Dish Name</th>
                                        <th>Ingredients</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ingredients as $dish)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $dish->dish_name }}</td>
                                        <td>
                                            <ul>
                                                @foreach (json_decode($dish->ingredients, true) as $ingredient => $details)
                                                    @if(is_array($details))
                                                        <li>{{ $ingredient }}: {{ implode(', ', $details) }}</li>
                                                    @else
                                                        <li>{{ $ingredient }}: {{ $details }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                                <form action="{{route('admin.ingredients.destroy', $dish->id)}}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </form>

                                                <form action="{{ route('admin.ingredients.destroy', $dish->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="{{asset('js/core/jquery-3.7.1.min.js')}}"></script>
<!-- Datatables -->
<script src="{{asset('js/plugin/datatables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function () {
        // Add Row
        $("#add-row").DataTable({
            pageLength: 5,
        });


        $("#openCreate").click(function () {
            window.location.href = '{{ route('admin.ingredients.create') }}';
        });

    });
</script>

@endsection