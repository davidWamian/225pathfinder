<?php

   namespace App\Http\Controllers;

   use Spatie\Sitemap\Sitemap;
   use Spatie\Sitemap\Tags\Url;

   class SitemapController extends Controller
   {
       public function generate()
       {
           // Créer une nouvelle instance de sitemap
           Sitemap::create()
               ->add(Url::create('/')) // Ajouter la page d'accueil
               ->add(Url::create('/about')) // Ajouter la page "À propos"
               ->add(Url::create('/companies')) // Ajouter la liste des entreprises
               ->add(Url::create('/contact')) // Ajouter la page de contact
               ->writeToFile(public_path('sitemap.xml')); // Enregistrer le sitemap dans le répertoire public

           return response()->json(['message' => 'Sitemap généré avec succès!']);
       }
   }
