<?php
namespace App\Repositories\Admin\Category;

use App\Models\Category;
use App\Traits\RepoResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Generals;

class CategoryAbstract implements CategoryInterface
{
    use RepoResponse;

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getPaginatedList($request,$per_page = 20)
    {
        $data = $this->category::get();
        // echo '<pre>';
        // echo '======================<br>';
        // print_r($data);
        // echo '<br>======================<br>';
        // exit();
        return $this->formatResponse(true, '', '', $data);
    }

    public function getList() {
        return DB::table('categories')->get();
    }

    public function postStore($request)
    {
        DB::beginTransaction();
        try {
            $category = new Category();
            $category->title = $request->title;
            $category->parent_id = $request->parent_id;
            $category->bg_color = $request->bg_color;
            $category->icon = $request->icon;
            $category->category_type = $request->category_type;
            $category->wheels = $request->wheels;
            if ($request->has('image')) {
                $category->image = Generals::upload('category/', 'png', $request->file('image'));
            }
            $category->status = 1;
            $category->save();
        } catch (\Exception $e) {
            info($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to create !', 'admin.category.index');
        }

        DB::commit();
        return $this->formatResponse(true, 'Category has been Created successfully !', 'admin.category.index');
    }

    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();
        try {
            $category = $this->category->where('id', $id)->first();
            $category->title = $request->title;
            $category->parent_id = $request->parent_id;
            $category->bg_color = $request->bg_color;
            $category->icon = $request->icon;
            $category->category_type = $request->category_type;
            $category->wheels = $request->wheels;
            $category->image = Generals::update('category/', $category->image, 'png', $request->file('image'));
            $category->status = 1;
            $category->update();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update!', 'admin.category.index');
        }
        DB::commit();
        return $this->formatResponse(true, 'Category has been updated successfully !', 'admin.category.index');
    }

    public function getShow(int $id)
    {
        $data =  Category::find($id);
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.category.index', $data);
        }
        return $this->formatResponse(false, 'Did not found data !', 'admin.category.index', null);
    }

    public function delete(int $id)
    {
        DB::begintransaction();
        try {
            DB::table('categories')->where('id', $id)->delete();
            DB::commit();
            echo 'deleted successfully';
        } catch (\Exception $e) {
           // dd($e);
            DB::rollback();
           return $this->formatResponse(false, 'Unable to delete this action !', 'admin.category.index');
        }
        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.category.index');
    }
}
