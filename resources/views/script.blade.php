<script>

    $(document).ready(function (){
        $('#createForm').on('click','#createSubmit',function (e){
           e.preventDefault();
           let name = $('#name').val();
            let age = $('#age').val();

            $.ajax({
                url: "{{ route('create') }}",
                method: "POST",
                data: {
                    name: name,
                    age: age,
                    _token: "{{ csrf_token() }}" // Important for Laravel CSRF protection
                },
                success: function (res) {
                    toastr.success('Customer added successfully!');
                    $('#createModal').modal('hide');
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '');
                    $('.table').load(location.href + ' .table');
                    $('#createForm')[0].reset();
                },
                error: function (xhr) {
                    toastr.error('Something went wrong!');
                    console.log(xhr.responseText);
                }
            });


        });

        //Delete
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            let id = $(this).data('id');

            if (confirm('Are you sure?')) {
                $.ajax({
                    url: "{{ route('delete') }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (res) {
                        toastr.success('Customer deleted successfully!');
                        $('.table').load(location.href + ' .table'); // Refresh table content
                    },
                    error: function (xhr) {
                        toastr.error('Something went wrong.');
                        console.log(xhr.responseText);
                    }
                });
            }
        });

        //Update
        $(document).on('click','#edit',function (e){
            e.preventDefault();
            let id=$(this).data('id');
            let name = $(this).data('name');
            let age = $(this).data('age');

            $('#id').val(id);
            $('#e_name').val(name);
            $('#e_age').val(age);

        });
        $(document).on('click','#editSubmit',function (e){
            e.preventDefault();
            let id = $('#id').val()
            let name = $('#e_name').val();
            let age = $('#e_age').val();

            $.ajax({
                url: "{{ route('update') }}",
                method: "POST",
                data: {
                    id:id,
                    name: name,
                    age: age,
                    _token: "{{ csrf_token() }}" // Important for Laravel CSRF protection
                },
                success: function (res) {
                    toastr.success('Customer Updated successfully!');
                    $('#editModal').modal('hide');
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '');
                    $('.table').load(location.href + ' .table');
                    $('#editForm')[0].reset();
                },
                error: function (xhr) {
                    toastr.error('Something went wrong!');
                    console.log(xhr.responseText);
                }
            });
        });


    });

</script>
