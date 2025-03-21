<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'type' => 'required|in:menu,submenu',
            'name' => 'required|max:255|unique:menus',
            'menu_id' => 'nullable|exists:menus,id',
            'parent_id' => 'nullable|exists:menus,id',
            'route' => 'required|max:255',
            'icon' => 'nullable|max:255',
            'list' => 'nullable',
        ]);

        if ($request->type === 'menu')
        {
            Menu::create([
                'name' => $validatedData['name'],
                'route' => $validatedData['route'],
                'icon' => $validatedData['icon'],
                'list' => $validatedData['list'],
            ]);
        }
        elseif ($request->type ==='submenu')
        {
            Menu::create([
                'menu_id' => $validatedData['menu_id'] ?? null,
                'parent_id' => $validatedData['parent_id'] ?? null,
                'name' => $validatedData['name'],
                'route' => $validatedData['route'],
            ]);
        }

        return redirect()->back()->with('success', 'New Menu has been created!');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $menu = Menu::findOrFail($id);
    
    
        $validatedData = $request->validate([
            'type' => 'required|in:menu,submenu',
            'id' => 'required',
            'name' => 'required|max:255|unique:menus,name,' . $menu->id, 
            'menu_id' => 'nullable|exists:menus,id',
            'parent_id' => 'nullable|exists:menus,id',
            'route' => 'required|max:255',
            'icon' => 'nullable|max:255',
            'list' => 'nullable',
        ]);

        $menu->update($validatedData);

        return redirect()->back()->with('success', 'Menu updated successfully!');
    }

    public function destroy(Request $request)
    {
        $menuId = $request->input('menu');

        if (!$menuId) {
            return redirect()->back()->with('error', 'Please Select a Menu You Want to Delete.');
        }

        $menu = Menu::find($menuId);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu not Found.');
        }

        $menu->delete();

        return redirect()->back()->with('success', 'Menu deleted successfully!');
    }
}