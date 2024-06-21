<?php

namespace App;

use Goutte\Client;

class SociollaScraper
{
    public function scrapeProductImages($productUrl)
    {
        $client = new Client();
        $crawler = $client->request('GET', $productUrl);

        $images = $crawler->filter('img.product-image')->each(function ($node) {
            return $node->attr('src');
        });

        return $images;
    }
}
