<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Carbon\Carbon;

class MenuController extends Controller
{
   
   public function manageMenu(){
      $title = "All Menu";
      $menu = Menu::orderBy('sort_id','Asc')->get()->toArray();
      return view('admin.menu.manage_menu',compact('menu','title'));
   }

   public function addMenu(){
       $title = "Add Menu";
       return view('admin.menu.add_menu',compact('title'));
   }
   
   public function storeMenu(Request $request){
        Menu::insert([
            'name' => $request->menu_name,
            'slug'=>strtolower(str_replace(' ','-',$request->menu_name)), 
            'status' => '1',    
            'created_at' => Carbon::now(), 
        ]);

       $notification = array(
            'message' => 'Menu Inserted Successfully',
            'alert-type' => 'success'
        );
       return redirect('admin/manage-menu')->with($notification); 

   }
   
   public function editMenu($id){
       $title = "Edit Menu";
       $menu = Menu::findOrFail($id);
       return view('admin.menu.edit_menu',compact('menu','title'));
   }

   public function updateMenu(Request $request){
       $menu_id = $request->id;

       Menu::findOrFail($menu_id)->update([
        'name' => $request->menu_name,
        'slug'=>strtolower(str_replace(' ','-',$request->menu_name)), 
        'updated_at' => Carbon::now(), 
        ]);

        
        $notification = array(
            'message' => 'Menu Updated Successfully',
            'alert-type' => 'success'
        );
       return redirect('admin/manage-menu')->with($notification);
       
   }

   

   public function updateMenuStatus(Request $request){
       
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }
            else{
                $status = 1;
            }
            Menu::where('id',$data['menu_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'menu_id'=>$data['menu_id']]);
        }
        
    }

   public function updateMenuOrder(Request $request){
         if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $menu = Menu::find($id);
                $menu->sort_id = $sortOrder;
                $menu->save();
            }

            return ['success'=>true,'message'=>'Updated'];
        }
   }
   

   public function deleteMenu($id){
        //delete brand
        Menu::where('id',$id)->delete();
      
        $notification = array(
            'message' => 'Menu Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('admin/manage-menu')->with($notification); 
       }
  
}
