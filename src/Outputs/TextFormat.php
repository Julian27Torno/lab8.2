<?php
namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class TextFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
       
        $output = "Founder: " . $profile->getFounder() . PHP_EOL . PHP_EOL;

      
        foreach ($profile->getSections() as $section) {
            $output .= $section['title'] . PHP_EOL; 
            $output .= str_repeat("=", strlen($section['title'])) . PHP_EOL; 
            foreach ($section['paragraphs'] as $paragraph) {
                $output .= $paragraph . PHP_EOL . PHP_EOL; 
            }
        }

        $this->response = $output;
    }

    public function render()
    {
        header('Content-Type: text/plain');
        return $this->response;
    }
}
