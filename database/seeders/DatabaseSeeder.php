<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $profissoes = [
            'Adestrador de animais',
            'Advogado',
            'Aplicador de película residencial',
            'Ator',
            'Babá',
            'Barbeiro',
            'Cabeleireiro',
            'Capinador',
            'Cerimonialista',
            'Churrasqueiro',
            'Coach',
            'Confeiteira',
            'Contador',
            'Corretor',
            'Costureira',
            'Cozinheira',
            'Cuidador de idoso',
            'Dançarino',
            'Dentista',
            'Desing de sobrancelhas',
            'Detetizador',
            'Diarista',
            'Eletricista',
            'Encanador',
            'Enfermeiro',
            'Faxineira',
            'Fisioterapeuta',
            'Fonoaudiologo',
            'Fotografo',
            'Freteiro',
            'Garçom',
            'Gesseiro',
            'Guia turistico',
            'Jardineiro',
            'Jornalista',
            'Lavador de carro',
            'Locutor',
            'Manicure & Pedicure',
            'Maquiadora',
            'Marceneiro',
            'Marmorista',
            'Massagista',
            'Mecanico',
            'Mestre de Obras',
            'Metalurgico',
            'Montador de antena',
            'Montador de móveis',
            'Motoboy',
            'Motorista',
            'Musico',
            'Nutricisonista',
            'Pedreiro',
            'Personal Trainer',
            'Pintor',
            'Piscineiro',
            'Professor',
            'Projetista de irrigação',
            'Projetista Eletrico',
            'Protético',
            'Psicologo',
            'Radialista',
            'Tecnico agricola',
            'Tecnico de informatica',
            'Técnico de Refrigeração',
            'Tecnico em edificação',
            'Técnico em Eletronica',
            'Tecnico em enfermagem',
            'Tratorista',
            'Videomaker',
            'Vidraceiro'
       ]; 

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mop.com',
            'password' => Hash::make('senha'),
        ]);
        DB::table('clients')->insert([
            'name' => 'Herbet',
            'email' => 'herbetjr@gmail.com',
            'cpf' => '04261687550',
            'telephone' => '7498114876',
            'birthDate' => '2000/05/23',
            'cep' => '48903822',
            'street' => 'herbetjr@gmail.com',
            'district' => 'herbetjr@gmail.com',
            'city' => 'dssdsd',
            'state' => 'dssdsd',
            'image' => 'image_user.png',
            'password' => Hash::make('04261687550'),
        ]);

        foreach ($profissoes as $p) {
            DB::table('profissions')->insert([
                'description' => $p
            ]);
        }

        DB::table('providers')->insert([
            'name' => 'Gil',
            'email' => 'gil@gmail.com',
            'cpf' => '12345678',
            'telephone' => '7498114876',
            'birthDate' => '1998/06/23',
            'cep' => '48903822',
            'street' => 'jua',
            'district' => 'jua',
            'city' => 'dssdsd',
            'state' => 'dssdsd',
            'image' => 'image_user.png',
            'profission_id' => 1,
            'confirmed' => true,
            'password' => Hash::make('12345678'),
        ]);
       

        // \App\Models\User::factory(10)->create();
    }
}
