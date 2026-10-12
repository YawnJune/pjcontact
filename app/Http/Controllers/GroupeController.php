<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    public function index()
    {
        $groupes = Groupe::withCount('contacts')
            ->orderBy('nom')
            ->get();

        return view('groupes.index', compact('groupes'));
    }

    public function create()
    {
        return view('groupes.create');
    }

    public function store(Request $request)
    {
        $donnees = $request->validate([
            'nom' => 'required|string|max:255|unique:groupes,nom',
        ]);

        Groupe::create($donnees);

        return redirect()
            ->route('groupes.index')
            ->with('succes', 'Le groupe a été ajouté avec succès.');
    }

    public function show(Groupe $groupe)
    {
        $groupe->load('contacts');

        return view('groupes.show', compact('groupe'));
    }

    public function edit(Groupe $groupe)
    {
        return view('groupes.edit', compact('groupe'));
    }

    public function update(Request $request, Groupe $groupe)
    {
        $donnees = $request->validate([
            'nom' => 'required|string|max:255|unique:groupes,nom,' . $groupe->id,
        ]);

        $groupe->update($donnees);

        return redirect()
            ->route('groupes.index')
            ->with('succes', 'Le groupe a été modifié avec succès.');
    }

    public function destroy(Groupe $groupe)
    {
        $groupe->delete();

        return redirect()
            ->route('groupes.index')
            ->with('succes', 'Le groupe a été supprimé avec succès.');
    }
}