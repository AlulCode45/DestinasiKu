@extends('template.main')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.tailwindcss.css">
@endsection
@section('main-content')
    <div class="bg-white shadow p-5 rounded-md">
        <div class="flex justify-between mb-5">
            <h2 class="text-xl font-semibold">Manage destinations</h2>
            <a class="bg-blue-500 text-white p-2 px-4 rounded-md" href="{{ route('destinations.create') }}">Add</a>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Destination Name</th>
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
                        <td class="flex gap-1">
                            <a href="{{ route('destinations.show', $destination->id) }}"
                                class="bg-primary text-white p-2 px-4 rounded-md">View</a>
                            <a href="{{ route('destinations.edit', $destination->id) }}"
                                class="bg-blue-500 text-white p-2 px-4 rounded-md">Edit</a>

                            <!-- Form Delete -->
                            <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST"
                                onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 px-4 rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Destination Name</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.tailwindcss.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function confirmDelete(event) {
            if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                event.preventDefault();
            }
        }
    </script>
@endsection
