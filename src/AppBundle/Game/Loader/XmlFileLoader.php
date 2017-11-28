<?php

namespace AppBundle\Game\Loader;

class XmlFileLoader implements LoaderInterface
{
    public function load($dictionary)
    {
        $words = array();
        $xml = new \SimpleXmlElement(file_get_contents($dictionary));
        foreach ($xml->word as $word) {
            $words[] = (string) $word;
        }

        return $words;
    }
}