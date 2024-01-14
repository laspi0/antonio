<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billet;


class BilletController extends Controller
{
    public function create()
    {
        return view('billets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'classe' => 'required',
            'tarif' => 'required|numeric',
            'depart' => 'required',
            'arrive' => 'required',
            'heure_depart' => 'required|date',
        ]);

        $billet = new Billet([
            'classe' => $request->input('classe'),
            'tarif' => $request->input('tarif'),
            'depart' => $request->input('depart'),
            'arrive' => $request->input('arrive'),
            'heure_depart' => $request->input('heure_depart'),
            'user_id' => auth()->user()->id
        ]);

        $billet->save();

        return redirect()->route('billets.index')->with('success', 'Billet créé avec succès.');
    }


    public function show($id)
    {
        $billet = Billet::findOrFail($id);
        return view('billets.show', compact('billet'));
    }

    public function index()
    {
        $billets = Billet::where('user_id', auth()->user()->id)->get();
        return view('billets.index', compact('billets'));
    }
    public function cancel($id)
    {
        $billet = Billet::where('id', $id)->where('user_id', auth()->user()->id)->first();

        if ($billet) {
            $billet->delete();
            return redirect()->route('billets.index')->with('success', 'Billet annulé avec succès.');
        }

        return redirect()->route('billets.index')->with('error', 'Impossible d\'annuler le billet.');
    }

}
