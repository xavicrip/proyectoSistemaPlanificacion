<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EntidadFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_crear_entidad_redirige_y_guarda_en_bd(): void
    {
        // Desactivar middleware (auth, csrf, etc.)
        $this->withoutMiddleware();

        // Ejecutar petición HTTP real
        $response = $this->post(route('entidades.store'), [
            'nombre' => 'Ministerio del Ambiente',
            'tipo' => 'Publica',
            'responsable' => 'Jose Ramirez',
        ]);

        // Verificar redirección correcta
        $response->assertRedirect(route('entidades.index'));

        // Verificar que el registro se guardó en la base de datos
        $this->assertDatabaseHas('entidades', [
            'nombre' => 'Ministerio del Ambiente',
            'tipo' => 'Publica',
            'responsable' => 'Jose Ramirez',
        ]);
    }
}
