<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestinationRequest;
use App\Http\Requests\ImagesRequest;
use App\Interfaces\DestinationImagesInterface;
use App\Interfaces\DestinationInterface;
use Illuminate\Http\Request;
use Storage;

class DestinationController extends Controller
{
    private $destination;
    private $destinationImage;

    function __construct(DestinationInterface $destination, DestinationImagesInterface $destinationImages)
    {
        $this->destination = $destination;
        $this->destinationImage = $destinationImages;
    }

    public function index()
    {
        $data = [
            'destinations' => $this->destination->getDestinations()
        ];
        return view('dashboard.destinations.destination', $data);
    }

    public function show($destination)
    {
        $data = [
            'destination' => $this->destination->getDestinationById($destination),
        ];
        return view('dashboard.destinations.view-destination', $data);
    }

    public function destroy($destination)
    {
        if ($this->destination->deleteDestination($destination)) {
            return back()->with('success', 'Destinasi Berhasil Dihapus');
        }
    }

    public function edit($destination)
    {
        $data = [
            'destination' => $this->destination->getDestinationById($destination)
        ];
        return view('dashboard.destinations.edit-destination', $data);
    }

    public function update(Request $request, $destination)
    {
        $request['province_id'] = $request->province;
        $request['regency_id'] = $request->regency;
        $request['district_id'] = $request->district;
        $request['village_id'] = $request->village;
        // Update destination
        if ($this->destination->updateDestination($request->all(), $destination)) {
            $files = $request->file('images');
            $images = [];

            if ($files) { // Cek jika ada file yang diunggah
                if (is_array($files)) {
                    foreach ($files as $file) {
                        $fileUploaded = Storage::disk('public')->put("destinations/{$destination}", $file);
                        $images[] = [
                            'destination_id' => $destination,
                            'image' => $fileUploaded,
                        ];
                    }
                } else {
                    $fileUploaded = Storage::disk('public')->put("destinations/{$destination}", $files);
                    $images[] = [
                        'destination_id' => $destination,
                        'image' => $fileUploaded,
                    ];
                }
                // Store the images in the database
                $this->destinationImage->store($images);
            }

            return back()->with('success', 'Destinasi Berhasil Diubah');
        }

        // Kembalikan response jika update gagal
        return back()->with('error', 'Gagal Mengubah Destinasi');
    }
    function deleteImage($id)
    {
        $image = $this->destinationImage->getImageById($id);
        $this->destinationImage->delete($id);
        Storage::disk('public')->delete($image->image);
        return back()->with('success', 'Gambar Berhasil Dihapus');
    }
    function create()
    {
        return view('dashboard.destinations.add-destination');
    }
    function store(Request $request)
    {
        $request['province_id'] = $request->province;
        $request['regency_id'] = $request->regency;
        $request['district_id'] = $request->district;
        $request['village_id'] = $request->village;

        $saveDestination = $this->destination->createDestination($request->all());
        if ($saveDestination) {
            $files = $request->file('images');
            $images = [];

            if ($files) { // Cek jika ada file yang diunggah
                if (is_array($files)) {
                    foreach ($files as $file) {
                        $fileUploaded = Storage::disk('public')->put("destinations/{$saveDestination->id}", $file);
                        $images[] = [
                            'destination_id' => $saveDestination->id,
                            'image' => $fileUploaded,
                        ];
                    }
                } else {
                    $fileUploaded = Storage::disk('public')->put("destinations/{$saveDestination->id}", $files);
                    $images[] = [
                        'destination_id' => $saveDestination->id,
                        'image' => $fileUploaded,
                    ];
                }
                // Store the images in the database
                $this->destinationImage->store($images);
            }

            return redirect()->to(route('destinations.index'))->with('success', 'Destinasi Berhasil Ditambahkan');
        }

        // Kembalikan response jika update gagal
        return back()->with('error', 'Gagal Menambahkan Destinasi');
    }
}