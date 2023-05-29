<?php 

require 'vendor/autoload.php';
require 'src/SearchProject.php';

use GuzzleHttp\Client;
use Project\SearchProject\Search;
use Symfony\Component\DomCrawler\Crawler;



$client =  new Client(['verify' => false, 'base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();


$searching = new Search($client, $crawler);
$courses = $searching -> search('cursos-online-programacao');



foreach( $courses as $curse ){
    echo $curse .PHP_EOL;
}



?>