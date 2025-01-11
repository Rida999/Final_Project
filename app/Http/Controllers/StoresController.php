<?php

namespace App\Http\Controllers;

use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoresController extends Controller
{
    public function index()
    {
        $stores = Stores::paginate(10);
        return view('pages.stores.index', compact('stores'));
    }

    public function create()
    {
        return view('pages.stores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:stores,name',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Stores::create($data);
        return redirect()->route('stores.index')->with('success', 'Store created successfully!');
    }

    public function edit($id)
    {
        $store = Stores::findOrFail($id);
        return view('pages.stores.edit', compact('store'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:stores,name,' . $id,
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $store = Stores::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($store->logo) {
                Storage::disk('public')->delete($store->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $store->update($data);
        return redirect()->route('stores.index')->with('success', 'Store updated successfully!');
    }

    public function destroy($id)
    {
        $store = Stores::findOrFail($id);

        // Delete logo file if exists
        if ($store->logo) {
            Storage::disk('public')->delete($store->logo);
        }

        $store->delete();
        return redirect()->route('stores.index')->with('success', 'Store deleted successfully!');
    }
}
