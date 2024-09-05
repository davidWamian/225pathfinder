<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Afficher la liste de toutes les entreprises
    public function index()
    {
        $companies = Company::paginate(10); // Paginer les résultats, 10 par page
        return view('companies.index', compact('companies')); // Retourner la vue avec les données des entreprises
    }

    // Afficher le formulaire de création d'une nouvelle entreprise
    public function create()
    {
        return view('companies.create'); // Retourner la vue pour créer une nouvelle entreprise
    }

    // Enregistrer une nouvelle entreprise dans la base de données
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'contacts' => 'required|string',
        ]);

        // Créer un nouvel enregistrement d'entreprise dans la base de données
        Company::create($validated);
        return redirect()->route('companies.index')->with('success', 'Entreprise créée avec succès.');
    }

    // Afficher les détails d'une entreprise spécifique
    public function show(Company $company)
    {
        return view('companies.show', compact('company')); // Retourner la vue avec les détails de l'entreprise
    }

    // Afficher le formulaire d'édition d'une entreprise spécifique
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company')); // Retourner la vue pour éditer l'entreprise
    }

    // Mettre à jour une entreprise spécifique dans la base de données
    public function update(Request $request, Company $company)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'contacts' => 'required|string',
        ]);

        // Mettre à jour l'enregistrement de l'entreprise dans la base de données
        $company->update($validated);
        return redirect()->route('companies.index')->with('success', 'Entreprise mise à jour avec succès.');
    }

    // Supprimer une entreprise spécifique de la base de données
    public function destroy(Company $company)
    {
        $company->delete(); // Supprimer l'enregistrement de l'entreprise
        return redirect()->route('companies.index')->with('success', 'Entreprise supprimée avec succès.');
    }
    // Méthode pour gérer la recherche
    public function search(Request $request)
    {
        // Récupérer la requête de recherche saisie par l'utilisateur
        $query = $request->input('query');

        // Effectuer la recherche avec Scout et Solr
        $articles = Article::search($query)->get();

        // Retourner les résultats à la vue
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);

        // Définir les balises meta dynamiques
        $metaDescription = $company->description;
        $metaKeywords = implode(', ', ['mot-clé1', 'mot-clé2', 'mot-clé3']);

        // Passer les variables à la vue
        return view('company.show', compact('company', 'metaDescription', 'metaKeywords'));
    }

}
