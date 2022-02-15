<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Contracts\Validation\Validator; 
use Illuminate\Routing\Redirector;
use App\Exports\StudentExport;
use Excel;



class StudentController extends Controller
{

     public function index()
    {
          $artist = Student::get();
      return view('index',compact('artist')); 
        
    }

     public function addstudent()
    {
        return view('student');
    }
   public function storestudent(Request $request)
    {
      $this->validate($request, [
        'name'    =>'required',
        'email'       => 'required',
        'contact_no'  =>'required',
        'upload' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'status'  =>'required'
       ]); 

 if (request()->hasFile('upload')) {
             $file = request()->file('upload');
             $filename = $file->getClientOriginalName();
             $extension = $file->getClientOriginalExtension(); // getting image extension
             $upload = url('/uploads/studentimages/', time().rand().'_no.'.$extension); // renameing image
             $path =$file->move('uploads/studentimages/', $upload);  
        }

        
        Student::create([
              'name'   =>$request->name,
              'email'     =>$request->email,
              'upload'  =>$upload,
              'contact_no'      =>$request->contact_no,      
              'status'      =>$request->status,         
         ]);
    
         return back()->With(['status' => "success", 'success' => "Create successfully!!"]);
  } 


  public function changestatus(Request $request)
    {
    
 $this->validate($request, [
        'id'    =>'required',
        'status'  =>'required'
       ]); 

      $id = $request->id;
      $status = $request->status;

         $checkstatus = Student::where('id',$id)->first();
         if($checkstatus->status == 2)
         {
            return back()->With(['status' => "failed", 'failed' => "No one can change the Status!!"]);
         }
    else
      {
       $updatestudent = Student::where('id',$id)->update([
                'status' => $status,
            ]);
        return back()->With(['status' => "success", 'success' => "Update successfully!!"]);
    }
        
    
  } 
    public function exportIntoExcel(){
       
      return Excel::download(new StudentExport,'Studentlist.xlsx');
    }
    public function exportIntoCSV(){
       
      return Excel::download(new StudentExport,'Studentlist.csv');
    }
    
}

