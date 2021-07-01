<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    for ($i = 0; $i < 10; $i++){
      $new_post = new Post();
      $new_post->title = "Titolo post " . ($i + 1);
      $new_post->slug = Str::slug($new_post->title, '-');
      $new_post->content = ($i + 1) . " La sigaretta elettronica è un inalatore che vaporizza un liquido, simulando così il fumo del tabacco delle sigarette. Ultimamente se ne vedono parecchie in giro, e ancora non ci abbiamo fatto l’abitudine: vediamo gente che sbuffa fumo in luoghi chiusi in grande tranquillità, mentre noi sgraniamo gli occhi, e poi ci accorgiamo che invece di una sigaretta hanno in mano una specie di tubetto. Il fumo della sigaretta elettronica non puzza.";
      $new_post->save();
    }
}

}