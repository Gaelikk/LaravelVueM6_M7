<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        //ADMIN
        $user = new User();
        $user->name = 'admin';
        $user->surname = 'admin';
        $user->email = 'admin@admin.com';
        $user->username = 'admin';
        $user->password = Hash::make('1234');
        $user->type = User::ADMIN_TYPE;
        $user->save();

        //NORMAL USER
        $user = new User();
        $user->name = 'Gael';
        $user->surname = 'Caraballo';
        $user->email = 'gael@gael.com';
        $user->username = 'gaelik';
        $user->password = Hash::make('1234');
        $user->type = User::DEFAULT_TYPE;
        $user->save();

        //WORKER
        $user = new User();
        $user->name = 'Traballador';
        $user->surname = '1';
        $user->email = 'worker@worker.com';
        $user->username = 'worker';
        $user->password = Hash::make('1234');
        $user->type = User::WORKER_TYPE;
        $user->save();

        //GAME
        $game = new Game();
        $game->name = 'ScapeRoom Night';
        $game->organization = 'Cirvianum ScapeRoom';
        $game->image = 'https://media.tacdn.com/media/attractions-splice-spp-674x446/06/73/12/c5.jpg';
        $game->save();

        //ROOM
        $room = new Room();
        $room->name = 'Sala Negra';
        $room->organization = 'Cirvianum ScapeRoom';
        $room->image = 'https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2017/10/30/15093734709755.jpg';
        $room->game = $game->name;
        $room->save();
    }
}
