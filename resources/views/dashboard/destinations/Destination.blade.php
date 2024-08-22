@extends('template.main')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.tailwindcss.css">
@endsection
@section('main-content')
    <div class="bg-white shadow p-5 rounded-md">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Destination Namae</th>
                <th>Vendor</th>
                <th>Province</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($destinations as $destination)
                <tr>
                    <td>{{ $destination->name }}</td>
                    <td>{{ $destination->company->name }}</td>
                    <td>{{ $destination->province->name }}</td>
                    <td>${{ $destination->price }}</td>
                    <td class="flex gap-3">
                        <a href="/dashboard/destinations/{{$destination->id}}"
                           class="bg-primary text-white p-2 rounded-md">View</a>
                        <button class="bg-blue-500 text-white p-2 rounded-md">Edit</button>
                        <button class="bg-red-500 text-white p-2 rounded-md">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Destination Namae</th>
                <th>Vendor</th>
                <th>Province</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.tailwindcss.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection
