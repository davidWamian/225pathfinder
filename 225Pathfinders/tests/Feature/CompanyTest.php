<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Company;

class CompanyTest extends TestCase
{
    use RefreshDatabase; // Rafraîchir la base de données pour chaque test

    public function test_company_creation()
    {
        // Simuler une requête POST pour créer une nouvelle entreprise
        $response = $this->post('/companies', [
            'name' => 'Test Company',
            'description' => 'Une description de test',
            'location' => 'Lieu de test',
            'latitude' => 10.000,
            'longitude' => 20.000,
            'contacts' => 'test@example.com'
        ]);

        // Vérifier que le statut de la réponse est 302 (redirection après création réussie)
        $response->assertStatus(302);

        // Vérifier que la nouvelle entreprise est dans la base de données
        $this->assertDatabaseHas('companies', [
            'name' => 'Test Company'
        ]);
    }
}
