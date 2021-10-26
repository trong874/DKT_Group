<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $module = [];

    public function __construct(Request $request)
    {
        $this->module = $request->segment(1);
    }

    public function index()
    {
        $module  = $this->module;
        $page_title = 'Quản lí danh mục '.$this->module;
        $page_description = '';
        $groups = Group::with('group')->where('module',$this->module)->orderBy('order','ASC')->get();
        return view('backend.groups.list',compact('page_title','page_description','groups','module'));
    }

    public function create()
    {
        $module = $this->module;
        $page_title = 'Tạo mới danh mục '.$this->module;
        $page_description = 'is description';
        $groups = Group::where('module',$this->module)->get();
        return view('backend.groups.form-data',compact('page_title','page_description','groups','module'));
    }

    public function store(Request $request)
    {
       Group::create($request->all());
       return redirect()->route("$this->module.index");
    }

    public function show(Request $request)
    {
        $module = substr($this->module,0,-5);
        $page_title = 'Danh sách bài viết';
        $page_description = '';
        $groups = Group::where('module',$this->module)->get(['id','title','parent_id']);
        $items = Group::with('item')->where('slug',$request->segment(2))->first('id');
        $items = $items->item()->paginate(10);
        return view('backend.items.list', compact('page_title', 'page_description', 'items', 'groups', 'module'));
    }


    public function edit($id)
    {
        $module = $this->module;
        $page_title = 'Sửa danh mục '.$this->module;
        $page_description = 'is description';
        $group = Group::find($id);
        $groups = Group::all();
        return view('backend.groups.form-data',compact('page_title','page_description','group','groups','module'));
    }

    public function update(Request $request, $id)
    {
       $group = Group::find($id);
       $group->update($request->all());
       return redirect()->route("$this->module.index");
    }

    public function destroy($id)
    {
        $groups = Group::findOrFail($id);
        $groups->item()->detach();
        $groups->delete();
        return redirect()->back();
    }

    function saveList(Request $list)
    {
        $this->recursive($list->all()['list']);
        return response()->json('cập nhật danh sách thành công',200);
    }

    public function recursive($list, $parent_id = null, &$order = 0)
    {
        foreach ($list as $item) {
            $order++;
            $group = Group::find($item['id']);
            $group->order = $order;
            $group->parent_id = $parent_id;
            $group->save();
            if (array_key_exists('children',$item)) {
                $this->recursive( $item["children"], $item["id"], $order);
            }
        }
    }

    public function destroyMultiple(Request $request)
    {
        $ids = $request->ids;
        Group::whereIn('id', explode(",", $ids))->delete();
    }
}
