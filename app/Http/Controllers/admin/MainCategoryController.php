<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{

    use Message_Trait;
    use Slug_Trait;
    use Upload_Images;

    public function index()
    {
        $categories = MainCategory::orderby('id', 'desc')->get();
        return view('admin.MainCategory.index', compact('categories'));
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->isMethod('post')) {
                try {
                    $alldata = $request->all();
                    // Make Validation
                    $rules = [
                        'name' => 'required',
                        'status' => 'required',
                        'image' => 'image|required|mimes:jpg,png,jpeg,webp',
                    ];
                    $customeMessage = [
                        'name.required' => 'من فضلك ادخل اسم القسم',
                        'status.required' => 'حدد حالة القسم ',
                        'image.mimes' =>
                            'من فضلك يجب ان يكون نوع الصورة jpg,png,jpeg,webp',
                        'image.image' => 'من فضلك ادخل الصورة بشكل صحيح',
                    ];
                    $this->validate($request, $rules, $customeMessage);
                    /// Upload Admin Photo
                    if ($request->hasFile('image')) {
                        $file_name = $this->saveImage($request->image, public_path('assets/uploads/category_images'));
                    }
                    $new_category = new MainCategory();
                    $new_category->name = $alldata['name'];
                    $new_category->slug = $this->CustomeSlug($alldata['name']);
                    $new_category->description = $alldata['description'];
                    $new_category->status = $alldata['status'];
                    $new_category->meta_title = $alldata['meta_title'];
                    $new_category->meta_description = $alldata['meta_description'];
                    $new_category->meta_keywords = $alldata['meta_keywords'];
                    $new_category->image = $file_name;
                    $new_category->save();
                    return $this->success_message(' تمت اضافة القسم بنجاح ');
                } catch (\Exception $e) {
                    return $this->exception_message($e);
                }
            }
        }
        return view('admin.MainCategory.add');
    }

    public function update(Request $request, $id)
    {
        $category = MainCategory::findOrFail($id);

        if ($request->isMethod('post')) {
            try {
                $alldata = $request->all();
                // Make Validation
                $rules = [
                    'name' => 'required',
                    'status' => 'required',
                ];
                if ($request->hasFile('image')) {
                    $rules['image'] = 'image|mimes:jpg,png,jpeg,webp';
                }
                $customeMessage = [
                    'name.required' => 'من فضلك ادخل اسم القسم',
                    'status.required' => 'حدد حالة القسم ',
                    'image.mimes' =>
                        'من فضلك يجب ان يكون نوع الصورة jpg,png,jpeg,webp',
                    'image.image' => 'من فضلك ادخل الصورة بشكل صحيح',
                ];
                $this->validate($request, $rules, $customeMessage);
                /// Upload Category Image
                if ($request->hasFile('image')) {
                    ////// Delete Old Image
                    $old_image = public_path('assets/uploads/category_images/' . $category['image']);
                    if (isset($old_image) && $old_image != '') {
                        unlink($old_image);
                    }
                    $file_name = $this->saveImage($request->image, public_path('assets/uploads/category_images'));
                    $category->update([
                        'image' => $file_name,
                    ]);
                }
                $category->update([
                    "name" => $alldata['name'],
                    "slug" => $this->CustomeSlug($alldata['name']),
                    "description" => $alldata['description'],
                    "status" => $alldata['status'],
                    "meta_title" => $alldata['meta_title'],
                    "meta_description" => $alldata['meta_description'],
                    "meta_keywords" => $alldata['meta_keywords'],
                ]);
                return $this->success_message(' تم تعديل القسم بنجاح  ');
            } catch (\Exception $e) {
                return $this->exception_message($e);
            }

        }
        return view('admin.MainCategory.update', compact('category'));
    }

    public function delete($id)
    {
        try{
            $category = MainCategory::findOrFail($id);
            $old_image = public_path('assets/uploads/category_images/' . $category['image']);
            if (isset($old_image) && $old_image !=''){
                unlink($old_image);
            }
            $category->delete();
            return $this->success_message(' تم حذف القسم بنجاح  ');
        }catch (\Exception $e){
            return $this->exception_message($e);
        }
    }
}
