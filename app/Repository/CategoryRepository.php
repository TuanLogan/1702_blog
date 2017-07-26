<?php 
namespace App\Repository;
use Log;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class CategoryRepository
{
	public static function GetAll(Request $request){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		if($request->input('keyword') != ""){
			$keyword = $request->input('keyword');

			$cateList = Category::where('cate_name', 'like', "%$keyword%")->paginate(20)->withPath("?keyword=$keyword");

			Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
			return $cateList;
		}else{
			Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
			return Category::paginate(20);
		}
	}

	public static function Save(Request $request){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
		// begin transaction
		DB::beginTransaction();
		// try
		try{

			$model = new Category();
	        $model->fill($request->all());

	        $model->save();
	        DB::commit();
	        // neu k co loi thi tien hanh return true
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	        return true;

	    // catch     
		}catch(\Exception $ex){
			// neu xay ra loi thi return false
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return false;
		}	
	}

	public static function Destroy($id){
		Log::info('BEGIN ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');

		$model = Category::find($id);
		if(!$model){
			Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
			return false;
		}
		// begin transaction
		DB::beginTransaction();
		// try
		try{

	        $model->delete();
	        DB::commit();
	        // neu k co loi thi tien hanh return true
	        Log::info('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '()');
	        return true;

	    // catch     
		}catch(\Exception $ex){
			// neu xay ra loi thi return false
			Log::error('END ' 
			. get_class() . ' => ' . __FUNCTION__ . '() - ' . $ex->getMessage());
			DB::rollback();
			return false;
		}	
	}
	
}



 ?>