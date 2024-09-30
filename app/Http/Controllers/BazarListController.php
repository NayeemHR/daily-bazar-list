<?php

namespace App\Http\Controllers;

use App\Models\BazarList;
use App\Models\Product;
use Illuminate\Http\Request;

class BazarListController extends Controller
{
    public function index()
    {
        $bazarLists = BazarList::with('items.product')->where('user_id', auth()->id())->get();
        return view('bazar_lists.index', compact('bazarLists'));
    }

    public function create()
    {
        return view('bazar_lists.create');
    }

    public function store(Request $request)
    {
        $bazarList = BazarList::create([
            'user_id' => auth()->id(),
            'status' => 'pending',
        ]);

        return redirect()->route('bazar_lists.index')->with('success', 'Bazar List created successfully.');
    }

    public function show($id)
    {
        // Find the Bazar List
        $bazarList = BazarList::with('items.product')->findOrFail($id);

        // Fetch all products to display in the dropdown
        $products = Product::all();

        // Pass the Bazar List and products to the view
        return view('bazar_lists.show', compact('bazarList', 'products'));

    }

    public function destroy($id)
    {
        $bazarList = BazarList::findOrFail($id);
        $bazarList->delete();

        return redirect()->route('bazar_lists.index')->with('success', 'Bazar List deleted successfully.');
    }
}
