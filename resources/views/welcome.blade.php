<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Curd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>
<body>
    <section>
        <h1 class="text-center mt-3 mb-3">Laravel Curd</h1>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Create</button>
                    <table id="example" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $key => $customer)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $customer->name }}</td>
                                <td class="text-center">{{ $customer->age }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary"
                                        data-bs-toggle="modal"
                                        id="edit"
                                        data-bs-target="#editModal"
                                        title="Edit"
                                        data-id="{{$customer->id}}"
                                        data-name="{{$customer->name}}"
                                        data-age="{{$customer->age}}"
                                        >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger delete" data-id="{{$customer->id}}" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <!-- Create Modal Start -->
                    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" id="createForm">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age:</label>
                                            <input type="number" name="age" id="age" class="form-control" required>
                                        </div>

                                        <button type="submit" id="createSubmit" class="btn btn-primary mt-3 mb-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Create Modal End -->
                    <!-- Edit Modal Start -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Info</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" id="editForm">
                                        @csrf
                                        <input type="hidden" name="id" id="id">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" name="name" id="e_name" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age:</label>
                                            <input type="number" name="age" id="e_age" class="form-control" required>
                                        </div>

                                        <button type="submit" id="editSubmit" class="btn btn-primary mt-3 mb-2">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Modal End -->
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @include('script')
</body>
</html>
