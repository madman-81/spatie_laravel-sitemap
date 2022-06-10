<?php

namespace Spatie\Sitemap\Test;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class ImageTest extends TestCase
{
    public function testXmlHasImage()
    {
        $expected_xml = '<?xml version="1.0" encoding="UTF-8"?>
                        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
                            <url>
                                <loc>https://localhost</loc>
                                <lastmod>2016-01-01T00:00:00+00:00</lastmod>
                                <changefreq>daily</changefreq>
                                <priority>0.8</priority>
                                <image:image>
                                    <image:loc>https://localhost/favicon.ico</image:loc>
                                    <image:caption>Favicon</image:caption>
                                </image:image>
                            </url>
                        </urlset>';

        $sitemap = Sitemap::create();
        $url = Url::create('https://localhost')->addImage('https://localhost/favicon.ico', 'Favicon');
        $sitemap->add($url);

        $render_output = $sitemap->render();

        $this->assertXmlStringEqualsXmlString($expected_xml, $render_output);
    }
}
