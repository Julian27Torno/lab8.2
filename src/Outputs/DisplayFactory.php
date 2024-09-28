<?php

namespace App\Outputs;

use App\Outputs\HTMLFormat;
use App\Outputs\PDFFormat;
use App\Outputs\TextFormat;

class DisplayFactory
{
    public static function getInstance($format = 'text')
    {
        switch ($format) {
            case 'text':
                return new TextFormat();
            case 'html':
                return new HTMLFormat();
            case 'pdf':
                return new PDFFormat();
            default:
                // Optionally handle an unknown format here
                throw new Exception("Unsupported format: " . $format);
        }
        
        
        // else
        return null;
    }
}
