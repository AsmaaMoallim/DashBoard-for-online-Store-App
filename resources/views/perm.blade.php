<!DOCTYPE html>
<html>
<head>
    <title>Laravel Datatables Action Buttons Example - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css')}}" />
    <link href=""{{ asset('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href=""{{ asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js')}}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js')}}"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')}}"></script>
</head>
<body>

<div class="container">
    <h1>Laravel Datatables Action Buttons Example - ItSolutionStuff.com</h1>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>per_name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

</body>

<script type="text/javascript">
    $(function () {

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('perm.index') }}",
            columns: [
                {data: 'per_name', name: 'per_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
</script>
</html>
