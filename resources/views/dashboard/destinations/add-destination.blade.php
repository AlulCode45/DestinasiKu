@extends('template.main')
@section('main-content')
    <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-white p-5 shadow">
            <div class="flex gap-5 mt-4">
                <div class="image w-1/2 relative">
                    <div class="relative" id="upload-image">
                        <img src="{{ asset('assets/default-image.webp') }}" alt="Default image" class="rounded z-1">
                        <div class="absolute z-50 bg-black/50 hidden w-full h-full top-0 rounded place-content-center transition-all duration-1000 ease-in-out"
                            id="upload-button" @click="showPrivacyPolicy = true">
                            <svg fill="#fff" width="100px" height="100px" viewBox="0 0 24 24" id="upload"
                                data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                                <line id="primary" x1="12" y1="16" x2="12" y2="3"
                                    style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </line>
                                <polyline id="primary-2" data-name="primary" points="16 7 12 3 8 7"
                                    style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </polyline>
                                <path id="primary-3" data-name="primary"
                                    d="M20,16v4a1.08,1.08,0,0,1-1.14,1H5.14A1.08,1.08,0,0,1,4,20V16"
                                    style="fill: none; stroke: rgb(255, 255, 255); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="flex gap-3 w-full">
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Destination Name
                            </label>
                            <input type="text" placeholder="Destination name"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                name="name" />
                        </div>
                        <div>
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Price ($)<small class="text-gray-300"> /night</small>
                            </label>
                            <input type="text" placeholder="Price"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                name="price" />
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Vendor Destination
                        </label>
                        <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                            <select
                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                :class="isOptionSelected && 'text-black dark:text-white'" @change="isOptionSelected = true"
                                name="destination_company_id">
                                <option value="">Select Vendor Destinations</option>
                                @foreach (\App\Models\DestinationCompany::all() as $company)
                                    <option value="{{ $company->id }}" class="text-body">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.8">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                            fill="#637381"></path>
                                    </g>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="flex mt-3 gap-3">
                        <div class="w-full">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Province
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                                <select
                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                    id="province" name="province">
                                    <option value="">Select Province</option>
                                    @foreach (\App\Models\Provinces::all() as $prov)
                                        <option value="{{ $prov->id }}">
                                            {{ $prov->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                fill="#637381"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="w-full">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Regency
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                                <select
                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                    name="regency" id="regency">
                                </select>
                                <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                fill="#637381"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex mt-3 gap-3">
                        <div class="w-full">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                District
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                                <select
                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                    name="district" id="district">
                                </select>
                                <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                fill="#637381"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="w-full">
                            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                                Village
                            </label>
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                                <select
                                    class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 pl-5 pr-12 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                                    name="village" id="village">
                                </select>
                                <span class="absolute right-4 top-1/2 z-10 -translate-y-1/2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.8">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                fill="#637381"></path>
                                        </g>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Description
                        </label>
                        <textarea rows="6" placeholder="Description" name="description"
                            class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-md bg-primary px-10 py-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                        Simpan
                    </button>
                </div>
            </div>
        </div>

        <!-- Upload Image Modal -->
        <div x-show="showPrivacyPolicy" class="fixed z-[999] inset-0 flex items-center justify-center">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            <div class="relative bg-white rounded-lg overflow-hidden shadow-xl max-w-screen-md w-full m-4"
                x-transition:enter="transition ease-out duration-300 transform opacity-0 scale-95"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform opacity-100 scale-100"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-cloak>
                <!-- Modal panel -->
                <div class="px-6 py-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900"> Upload Destination Images </h3>
                </div>
                <div class="prose max-w-screen-md p-6 overflow-y-auto"
                    style="max-height: 70vh; background-color: #fff; border: 1px solid #e2e8f0; border-radius: 0.375rem; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);">
                    <div class="form-group">
                        <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Attach file
                        </label>
                        <input type="file"
                            class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30
                            dark:file:text-black dark:focus:border-primary"
                            name="images[]" multiple>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 flex align-items justify-end p-4 gap-4 flex-row">
                    <button @click="showPrivacyPolicy = false" type="button"
                        class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-black text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400  sm:w-auto sm:text-sm">
                        Upload
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        document.querySelector('#upload-image').addEventListener('mouseover', e => {
            document.querySelector('#upload-button').classList.remove('hidden');
            document.querySelector('#upload-button').classList.add('grid')
        })
        document.querySelector('#upload-image').addEventListener('mouseleave', e => {
            document.querySelector('#upload-button').classList.remove('grid');
            document.querySelector('#upload-button').classList.add('hidden')
        })

        document.querySelectorAll('[id^="image-container-"]').forEach(container => {
            const id = container.id.replace('image-container-', '');
            const deleteButton = document.querySelector(`#delete-button-${id}`);

            container.addEventListener('mouseover', () => {
                deleteButton.classList.remove('hidden');
                deleteButton.classList.add('grid');
            });

            container.addEventListener('mouseleave', () => {
                deleteButton.classList.remove('grid');
                deleteButton.classList.add('hidden');
            });
        });

        function deleteImage(event, url) {
            event.preventDefault();
            if (confirm('Are you sure to delete this image?')) {
                window.location.href
            }
        }

        $(document).ready(function() {
            // Ketika provinsi dipilih
            $('select[name="province"]').on('change', function() {
                let provinceID = $(this).val();
                if (provinceID) {
                    $.ajax({
                        url: '/get-regencies/' + provinceID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="regency"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="regency"]').append('<option value="' +
                                    value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="regency"]').empty();
                    $('select[name="district"]').empty();
                    $('select[name="village"]').empty();
                }
            });

            // Ketika kabupaten dipilih
            $('select[name="regency"]').on('change', function() {
                let regencyID = $(this).val();
                if (regencyID) {
                    $.ajax({
                        url: '/get-districts/' + regencyID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="district"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district"]').append('<option value="' +
                                    value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="district"]').empty();
                    $('select[name="village"]').empty();
                }
            });

            // Ketika kecamatan dipilih
            $('select[name="district"]').on('change', function() {
                let districtID = $(this).val();
                if (districtID) {
                    $.ajax({
                        url: '/get-villages/' + districtID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="village"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="village"]').append('<option value="' +
                                    value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="village"]').empty();
                }
            });
        });
    </script>
@endsection
