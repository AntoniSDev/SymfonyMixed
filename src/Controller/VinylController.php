<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;
class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
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


    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre
        ]);
    }
}