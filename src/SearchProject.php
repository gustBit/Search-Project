<?php 

namespace Project\SearchProject;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Search
{
    private $httpClient;
    private $crawler; 
    public function __construct(ClientInterface $httpClient, Crawler $crawler){
        $this -> httpClient = $httpClient;
        $this -> crawler = $crawler;
    }
    public function search(string  $url): array 
    {
        $response = $this -> httpClient -> request('GET', $url);


        $html = $response -> getBody();
        $this -> crawler -> addHtmlContent($html);

        $coursesElements  = $this -> crawler -> filter('span.card-curso__nome');
        $courses = [];

        foreach ($coursesElements as $element){
            $courses [] = $element -> textContent;
        }

        return $courses;
    }
}






?>