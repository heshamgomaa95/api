<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $categories =Category::select('id','name_'.app()->getLocale().' as name')->get();
        return $this->returnData('categroy',$categories);
    }

    public function getCategoryById(Request $request){
        $category=Category::select('id','name_'.app()->getLocale().' as name')->find($request->id);
        if(!$category){
            return $this->returnError('001','not found id');
        }
        return $this->returnData('categroy',$category,'ok');
    }



    public function changeStatus(Request $request)
    {
        //validation
        Category::where('id',$request -> id) -> update(['active' =>$request -> active]);

        return $this -> returnSuccessMessage('تم تغيير الحاله بنجاح');

    }

}
