<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Groupe;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $recherche = $request->input('recherche');

        $contacts = Contact::with('groupe')
            ->when($recherche, function ($requete) use ($recherche) {
                $requete->where(function ($requete) use ($recherche) {
                    $requete->where('nom', 'like', '%' . $recherche . '%')
                            ->orWhere('prenom', 'like', '%' . $recherche . '%')
                            ->orWhere('tel', 'like', '%' . $recherche . '%')
                            ->orWhere('email', 'like', '%' . $recherche . '%');
                });
            })
            ->orderBy('nom')
            ->orderBy('prenom')
            ->get();

        return view('contacts.index', compact('contacts', 'recherche'));
    }

    public function create()
    {
        $groupes = Groupe::orderBy('nom')->get();

        return view('contacts.create', compact('groupes'));
    }

    
public function store(Request $request)
{
    $donnees = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'tel' => 'nullable|string|max:30',
        'email' => 'nullable|email|max:255',
        'adresse' => 'nullable|string|max:255',
        'entreprise' => 'nullable|string|max:255',
        'poste' => 'nullable|string|max:255',
        'groupe_id' => 'nullable|exists:groupes,id',
    ]);

    Contact::create($donnees);

    return redirect()
        ->route('contacts.index')
        ->with('succes', 'Le contact a été ajouté avec succès.');
}


    public function show(Contact $contact)
    {
        $contact->load('groupe');

        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $groupes = Groupe::orderBy('nom')->get();

        return view('contacts.edit', compact('contact', 'groupes'));
    }

    public function update(Request $request, Contact $contact)
    {
        $donnees = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tel' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'adresse' => 'nullable|string',
            'entreprise' => 'nullable|string|max:255',
            'poste' => 'nullable|string|max:255',
            'groupe_id' => 'nullable|exists:groupes,id',
        ]);

        $contact->update($donnees);

        return redirect()
            ->route('contacts.index')
            ->with('succes', 'Le contact a été modifié avec succès.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->with('succes', 'Le contact a été supprimé avec succès.');
    }
}