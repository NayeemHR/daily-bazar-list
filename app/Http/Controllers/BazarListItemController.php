<?php

namespace App\Http\Controllers;

use App\Models\BazarList;
use App\Models\BazarListItem;
use Illuminate\Http\Request;

class BazarListItemController extends Controller
{
    public function store(Request $request, $bazarListId)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $bazarList = BazarList::findOrFail($bazarListId);

        $bazarListItem = BazarListItem::create([
            'bazar_list_id' => $bazarList->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        if ($request->ajax()) {
            return response()->json([
                'id' => $bazarListItem->id,
                'product' => [
                    'name' => $bazarListItem->product->name,
                ],
                'quantity' => $bazarListItem->quantity,
            ]);
        }

        return redirect()->route('bazar_lists.show', $bazarList->id)->with('success', 'Item added to Bazar List.');
    }

    public function destroy($bazarListId, $itemId)
    {
        $item = BazarListItem::findOrFail($itemId);
        $item->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('bazar_lists.show', $bazarListId)->with('success', 'Item removed from Bazar List.');
    }

}
