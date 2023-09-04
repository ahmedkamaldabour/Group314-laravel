<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequst;
use App\Http\Requests\UpdateDoctorRequst;
use App\Http\Trait\UploadFile;
use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;
use function array_merge;
use function dd;
use function dump;

class DoctorController extends Controller
{

    use UploadFile;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::orderBy('id', 'desc')->paginate();
        return view('Admin.pages.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Major::get();
        return view('Admin.pages.doctor.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequst $request)
    {
        if ($request->hasFile('image')) {
            $image_name = $this->uploadImage($request->image, Doctor::IMAGE_PATH);
        }
        Doctor::create(array_merge($request->validated(), ['image' => $image_name]));
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $majors = Major::get();
        return view('Admin.pages.doctor.edit', compact('doctor', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequst $request, Doctor $doctor)
    {
        if ($request->hasFile('image')) {
            $image_name = $this->uploadImage($request->image, Doctor::IMAGE_PATH, $doctor->image);
        }
        $doctor->update(array_merge($request->validated(), ['image' => $image_name ?? $doctor->image]));
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $this->deleteImage($doctor->image, Doctor::IMAGE_PATH);
        $doctor->delete();
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor deleted successfully');
    }


}
