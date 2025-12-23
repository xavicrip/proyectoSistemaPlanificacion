<?php

namespace Tests\Unit;

use App\Models\Programas;
use \Tests\TestCase;

class ProgramasTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_crear_programas(): void
    {
        $programas = Programas::create([
            'nombrePrograma' => 'Planificacion Anual 2026',
            'tipoPrograma' => 'POA',
            'categoria' => 'Planificacion Anual',
        ]);

        $this->assertDatabaseHas('programas', [
            'nombrePrograma' => 'Planificacion Anual 2026',
            'tipoPrograma' => 'POA',
            'categoria' => 'Planificacion Anual',            
        ]); 
    }

    public function test_campos_programas(): void{

        $programas = new Programas();

        $this->assertSame(
            ['nombrePrograma', 'tipoPrograma', 'categoria'],
            $programas->getFillable()
        );  
    }
}
