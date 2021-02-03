<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all()->toArray();
        return $catalogs;
    }

    public function store(Request $request)
    {
        $catalog = new Catalog([
            'name' => $request->input('name'),
        ]);
        $catalog->save();

        return response()->json('Catalog created!');

    }

    public function show(Catalog $catalog)
    {
        return response()->json($catalog);
    }

    public function update(Request $request, Catalog $catalog)
    {
        $catalog->update($request->all());

        return response()->json('Catalog updated!');
    }

    public function destroy(Catalog $catalog)
    {
        $catalog->delete();

        return response()->json('Catalog deleted!');
    }
}
