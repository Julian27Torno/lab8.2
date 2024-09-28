<?php

namespace App;

class Profile
{
    private $founder;
    private $image;
    private $sections = [];

    public function __construct($data = null)
    {
        // Map the data to the class properties, handle missing fields
        if ($data) {
            $this->founder = isset($data['founder']) ? $data['founder'] : 'Unknown Founder';
            $this->image = isset($data['image']) ? $data['image'] : ''; 
            $this->sections = isset($data['sections']) ? $data['sections'] : [];
        }
    }

    public function getFounder()
    {
        return $this->founder;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getSections()
    {
        return $this->sections;
    }
}
