@extends('layouts.admin')
@section('title', 'Ingredients List')
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
                    <a href="#">All Dishes</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">All Dishes</h4>

                            <button class="btn btn-primary btn-round ms-auto" id="openCreate">
                                <i class="fa fa-plus"></i>
                                Add Dishes
                            </button>


                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="ShowModal" tabindex="-1" aria-labelledby="ShowModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ShowModalLabel">Dish Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6><strong>Dish Name:</strong></h6>
                                                <p id="dishName"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <h6><strong>Dish Type:</strong></h6>
                                                <p id="dishType"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><strong>Description:</strong></h6>
                                                <p id="dishDescription"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <img id="dishImage" src="" alt="Dish Image" class="img-fluid"
                                                    style="max-width: 300px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Dish Type</th>
                                        <th>Dish Name</th>
                                        <th>Dish Image</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dishes as $dish)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $dish->dishType->type_name }}</td>
                                        <td>{{$dish->dish_name}}</td>
                                        <td>
                                            <img src="{{ asset('dishes_images/' . $dish->dish_image) }}"
                                                alt="{{ $dish->dish_name }}" class="img-fluid"
                                                style="max-width: 100px; height: auto;">
                                        </td>

                                        <td>
                                            <div class="form-button-action">

                                                <button class="btn btn-link btn-secondary show-button"
                                                    data-bs-toggle="modal" data-bs-target="#ShowModal"
                                                    data-id="{{$dish->id}}">
                                                    <i class="fa fa-eye"></i>
                                                </button>


                                                <button class="btn btn-link btn-lg ms-auto edit-button"
                                                    data-id="{{ $dish->id }}" title="Edit" id="openEdit">
                                                    <i class="fa fa-edit"></i>
                                                </button>


                                                <form action="{{ route('admin.dishes.destroy', $dish->id) }}"
                                                    method="POST" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-link btn-danger btn-lg delete-btn"
                                                        data-url="{{ route('admin.dishes.destroy', $dish->id) }}"
                                                        data-bs-toggle="tooltip" title="Delete">
                                                        <i class="fa fa-times"></i>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        // Add Row
        $("#add-row").DataTable({
            pageLength: 5,
        });

        $('#openCreate').click(function () {
            window.location.href = '{{ route('admin.dishes.create') }}';
        })


    });

    $(document).on('click', '.edit-button', function () {
        var dishId = $(this).data('id'); // Get the dish ID from the data-id attribute
        window.location.href = '/admin/dishes/' + dishId + '/edit';
    });



    document.addEventListener('DOMContentLoaded', function () {
        const showButtons = document.querySelectorAll('.show-button');

        showButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');

                // Fetch dish details using AJAX
                fetch(`/admin/dishes/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate modal fields
                        document.getElementById('dishName').textContent = data.dish_name;
                        document.getElementById('dishType').textContent = data.dish_type.type_name;
                        document.getElementById('dishDescription').textContent = data.dish_description;
                        document.getElementById('dishImage').src = `/dishes_images/${data.dish_image}`;
                    })
                    .catch(error => {
                        console.error('Error fetching dish details:', error);
                    });
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        // Add click event listener to all delete buttons
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                const form = this.closest('form'); // Get the associated form
                const deleteUrl = this.dataset.url; // Fetch the delete URL

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Deleted!",
                            "Your dish type has been deleted.",
                            "success"
                        );
                        form.submit(); // Submit the form if confirmed
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            "Cancelled",
                            "Your dish type is safe!",
                            "error"
                        );
                    }
                });
            });
        });
    });


</script>

@endsection