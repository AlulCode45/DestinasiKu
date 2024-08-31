@extends('template.main')
@section('main-content')
    <div class="bg-white shadow p-5 rounded-md">
        <div class="flex justify-between mb-5">
            <h2 class="text-xl font-semibold">Edit Company</h2>
        </div>
        <form action="{{ route('vendor.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                Company name <span class="text-red-600">*</span>
            </label>
            <input type="text" placeholder="Company Name"
                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                name="name" value="{{ $company->name }}" required />
            <label class="mb-3 block text-sm font-medium text-black dark:text-white mt-3">
                Description <span class="text-red-600">*</span>
            </label>
            <textarea rows="6" placeholder="Description" name="description"
                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                required>{{ $company->description }}</textarea>
            <div class="mb-5">
                <button type="submit"
                    class="inline-flex items-center justify-center rounded-md bg-primary px-10 py-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
