<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'Raining Blood', 'artist' => 'Slayer'],
            ['song' => 'Burned Alive', 'artist' => 'Avenged Sevenfold'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'He Is', 'artist' => 'Ghost'],
            ['song' => 'Cemetery Gates', 'artist' => 'Pantera'],
            ['song' => 'A touch of Evil', 'artist' => 'Judas Priest'],
            ['song' => 'Antisocial', 'artist' => 'Anthrax'],
            ['song' => 'Freak On a leash', 'artist' => 'KoЯn'],
            ['song' => 'Masters of Pupppets', 'artist' => 'Metallica'],
            ['song' => '18 and LIFE', 'artist' => 'Skid Row'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Réveil en douceur',
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        if ($slug) {
            $title = 'Genre: '.u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'All Genres';
        }

        return new Response($title);

        //return new Response('Breakup vinyl? Angsty 90s rock? Browse the collection!');
    }
}
