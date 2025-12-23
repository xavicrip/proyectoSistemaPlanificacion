<?php

namespace Tests\Unit;

use App\Models\Entidad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \Tests\TestCase;

class EntidadTest extends TestCase
{
    
    use RefreshDatabase;
    public function test_crear_entidad(): void
    {
        $entidad = Entidad::create([
            'nombre' => 'Sercop',
            'tipo' => 'Institucion Publica',
            'responsable' => 'Jorge Andrade',
        ]);

        $this->assertDatabaseHas('entidades', [
            'nombre' => 'Sercop',
            'tipo' => 'Institucion Publica',
            'responsable' => 'Jorge Andrade',            
        ]); 
    }

    public function test_campos_entidad(): void{

        $entidad = new Entidad();

        $this->assertSame(
            ['nombre', 'tipo', 'responsable'],
            $entidad->getFillable()
        );  
    }



}
