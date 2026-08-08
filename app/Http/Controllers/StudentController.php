<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input("search");
        $students = Student::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where("id", "=", "$search")
                        ->orWhere("name", "like", "%{$search}%")
                        ->orWhere("email", "like", "%{$search}%")
                        ->orWhere("batch", "like", "%{$search}%")
                        ->orWhere("phone", "like", "%{$search}%");
                });
            })
            ->orderByDesc("id")
            ->paginate(10)
            ->withQueryString();
        return view("students.index", compact("students", "search"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"  => "required",
            "email" => "required|email|unique:students,email",
            "phone" => "required",
            "batch" => "required",
            "status" => "required",
            "photo" => "required|image|mimes:jpg,jpeg,webp,png|max:5000"
        ], [
            "name.required" => "Name is required",
            "email.required" => "Email is required",
            "email.email" => "Please enter a valid email address",
            "email.unique" => "This email is already registered",
            "phone.required" => "Phone number is required",
            "batch.required" => "Batch is required",
            "status.required" => "Status is required",
            "photo.required" => "Photo is required",
            "photo.image" => "The uploaded file must be an image",
            "photo.mimes" => "Photo must be JPG, JPEG, WEBP or PNG",
            "photo.max" => "Photo size must not exceed 5MB",
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->batch = $request->batch;
        $student->status = $request->status;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            // $photo_name = $request->name . time(). "." . $photo->getClientOriginalExtension();
            $photo_name = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads'), $photo_name);
            $student->photo = $photo_name;
        };
        $student->save();
        return redirect('/students')->with("success", "Student created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $student = Student::find($id);
        return view("students.edit", compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "name"  => "required",
            // এই student-এর ID বাদ দিয়ে অন্য কোনো student-এর email-এর সাথে duplicate কিনা check করো।
            "email" => "required|email|unique:students,email," . $id,
            "phone" => "required",
            "batch" => "required",
            "status" => "required",
            "photo" => "nullable|image|mimes:jpg,jpeg,webp,png|max:5000"
        ], [
            "name.required" => "Name is required",
            "email.required" => "Email is required",
            "email.email" => "Please enter a valid email address",
            "email.unique" => "This email is already registered",
            "phone.required" => "Phone number is required",
            "batch.required" => "Batch is required",
            "status.required" => "Status is required",
            "photo.required" => "Photo is required",
            "photo.image" => "The uploaded file must be an image",
            "photo.mimes" => "Photo must be JPG, JPEG, WEBP or PNG",
            "photo.max" => "Photo size must not exceed 5MB",
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->batch = $request->batch;
        $student->status = $request->status;
        $student->photo = $student->photo;

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                $old = public_path('uploads/' . $student->photo);
                if (File::exists($old)) {
                    File::delete($old);
                }
            }

            $photo = $request->file("photo");
            $photo_name = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads'), $photo_name);
            $student->photo = $photo_name;
        }

        $student->update();
        return redirect()->route('students.show', $student->id)->with("success", "Student updated successfully!");
    }


    /**
     * All deleted students
     */
    public function deletedStudents(Request $request)
    {
        $search = $request->input('search');
        $students = Student::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where("id", "=", "$search")
                        ->orWhere('name', "like", "%{$search}%")
                        ->orWhere('email', "like", "%{$search}%")
                        ->orWhere('batch', "like", "%{$search}%")
                        ->orWhere('phone', "like", "%{$search}%");
                });
            })
            ->onlyTrashed()
            ->orderByDesc("id")
            ->paginate(10)
            ->withQueryString();
        return view("students.deleted", compact("students", "search"));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
