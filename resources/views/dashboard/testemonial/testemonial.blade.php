@extends('template.main')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.tailwindcss.css">
    <script src="https://cdn.jsdelivr.net/npm/hystmodal@1.0.1/dist/hystmodal.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/hystmodal@1.0.1/dist/hystmodal.min.css" rel="stylesheet">
@endsection
@section('main-content')
    <div class="bg-white shadow p-5 rounded-md">
        <div class="flex justify-between mb-5">
            <h2 class="text-xl font-semibold">Manage Testemoni</h2>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Destination</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testemonial as $testemoni)
                    <tr>
                        <td>{{ $testemoni->name }}</td>
                        <td>{{ $testemoni->content }}</td>
                        <td>{{ $testemoni->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Destination</th>
                    <th>Date</th>
                </tr>
            </tfoot>
        </table>
    </div>


    <div class="hystmodal" id="myModal" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button data-hystclose class="hystmodal__close">Close</button>
                <div class="bg-white w-full p-10 rounded-full">
                    <form action="{{ route('vendor.store') }}" method="POST">
                        @csrf
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Testemoni name
                        </label>
                        <input type="text" placeholder="Testemoni Name"
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                            name="name" />
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white mt-3">
                            Description
                        </label>
                        <textarea rows="6" placeholder="Description" name="description"
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                        <div class="mb-5">
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-primary px-10 py-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

        const myModal = new HystModal({
            linkAttributeName: "data-hystmodal",
            //settings (optional). see Configuration
        });
    </script>
@endsection
