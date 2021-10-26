<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Item;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ItemController extends Controller
{
    protected $module = [];

    public function __construct(Request $request)
    {
        $this->module = $request->segment(1);
    }

    public function index()
    {
        $module = $this->module;
        $page_title = "$module management";
        $page_description = '';
        $groups = Group::where('module',$this->module.'-list')->get();
        $items = Item::with('user', 'groups')->where('module', $module)->paginate(10);
        return view('backend.items.list', compact('page_title', 'page_description', 'items', 'groups', 'module'));
    }

    public function showItemByGroup(Request $request)
    {
        $module = $this->module;
        $page_title = 'Item management';
        $page_description = 'is description';
        $groups = Group::with('item')->where('id',$request->segment(1))->get('id');
        $items = $groups[0]->item;
        return view('backend.items.list', compact('page_title', 'page_description', 'items', 'groups', 'module'));
    }

    public function create()
    {
        $module = $this->module;
        $page_title = 'Create ' . $module;
        $page_description = 'is description';
        $groups = Group::where('module',$this->module.'-list')->get();
        return view('backend.items.form-data', compact('page_title', 'page_description', 'groups', 'module'));
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());
        $item->groups()->attach($request->group_id);
        return redirect()->route($this->module . '.index');
    }

    public function show(Request $request)
    {

    }

    public function edit(Request $request)
    {
        $page_title = 'Edit Item';
        $module = $this->module;
        $page_description = 'is description';
        $item = Item::with('groups')->findOrFail($request->segment(2),['id','title','position','description','content','image','url','status']);
        $groups = Group::where('module',$this->module.'-list')->get([
            'id',
            'title',
            'parent_id'
        ]);
        return view('backend.items.form-data', compact('page_title', 'page_description', 'item', 'groups', 'module'));
    }

    public function update(Request $request)
    {
        $item = Item::find($request->segment(2));
        $item->groups()->sync($request->group_id);
        $item->update($request->all());
        return redirect()->route($this->module . '.index');
    }

    public function destroy(Request $request)
    {
        $item =  Item::findOrFail($request->segment(2));
        $item->groups()->detach();
        $item->delete();
        return redirect()->route($this->module . '.index');
    }

    public function destroyMultiple(Request $request)
    {
        $ids = $request->ids;
        Item::whereIn('id', explode(",", $ids))->delete();
    }

    public function addView($id_item)
    {
        $item = Item::find($id_item);
        $item->totalviews++;
        $item->save();
        return response()->json(['views' => $item->totalviews]);
    }

    public function searchItem(Request $request)
    {
        $q = Item::query();
        if ($request->group_id){
            $q->whereHas('groups',function (\Illuminate\Database\Eloquent\Builder $q) use($request){
                $group_id = $request->group_id;
                $q->where('groups.id',$group_id);
            });
        }
        if ($request->id) {
            $q->where('id', $request->id);
        }
        if ($request->title) {
            $q->where('title', 'LIKE', '%' . $request->title . '%');
        }
        if ($request->position) {
            $q->where('position', 'LIKE', '%' . $request->position . '%');
        }
        if ($request->date_from && $request->date_to){
            $q->whereBetween('created_at',[$request->date_from,$request->date_to]);
        }
        if ($request->date_from){
            $q->where('created_at','>=',$request->date_from);
        }

        $items = $q->paginate(10);
        $old_data = $request->all();
        $module = $this->module;
        $groups = Group::where('module',$module.'-list')->get();
        $page_title = "$module management";
        $page_description = '';
        return view('backend.items.list', compact('items', 'groups', 'old_data', 'page_title', 'page_description','module'));
    }

    public function filter(Request $request)
    {
        $module = 'article';
        $items = Item::with('user:id,name', 'groups')
            ->where('title', 'LIKE', '%' . $request->keyword . '%')
            ->paginate(10,[
                'id',
                'title',
                'image',
                'position',
                'order',
                'status',
                'created_at',
                ]);
        $html = view('backend.components.data_table_items', compact('items','module'))->render();
        return response()->json($html);
    }

}
