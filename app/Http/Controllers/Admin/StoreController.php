<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\{ Store, User };

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(10);
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $users = User::all(['id', 'name']);
        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $user = User::find($data['user']);
        $store = $user->store()->create($data);

        flash('Loja criada com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($storeID)
    {
        $store = Store::find($storeID);
        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $storeID)
    {
        $data = $request->all();

        $store = Store::find($storeID);
        $store->update($data);

        flash('Loja atualizada com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($storeID)
    {
        $store = Store::find($storeID);
        $store->delete();

        flash('Loja removida com sucesso!')->success();
        return redirect()->route('admin.stores.index');
    }
}