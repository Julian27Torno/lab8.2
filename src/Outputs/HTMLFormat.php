<?php
namespace App\Outputs;

use App\Outputs\ProfileFormatter;

class HTMLFormat implements ProfileFormatter
{
    private $response;

    public function setData($profile)
    {
        $output = "<h1>Profile of " . $profile->getFullName() . "</h1>";
        $output .= "<p>Email: " . $profile->getContactDetails()['email'] . "</p>";
        $output .= "<p>Phone: " . $profile->getContactDetails()['phone_number'] . "</p>";

        $output .= "<h2>Education</h2>";
        $output .= "<p>" . $profile->getEducation()['degree'] . " at " . $profile->getEducation()['university'] . "</p>";

        $output .= "<h2>Skills</h2>";
        $output .= "<p>" . implode(", ", $profile->getSkills()) . "</p>";

        $output .= "<h2>Experience</h2><ul>";
        foreach ($profile->getExperience() as $job) {
            $output .= "<li><strong>" . $job['job_title'] . " at " . $job['company'] . " (" . $job['start_date'] . " to " . $job['end_date'] . ")</strong></li>";
            $output .= "<p style='margin-top: 10px; margin-bottom: 10px;'>Description: " . $job['description'] . "</p>";
        }
        $output .= "</ul>";

        // Certifications
        $output .= "<h2>Certifications</h2><ul>";
        foreach ($profile->getCertifications() as $cert) {
            $output .= "<li>" . $cert['name'] . " (" . $cert['date_earned'] . ")</li>";
        }
        $output .= "</ul>";

        // Extra Curricular Activities
        $output .= "<h2>Extra Curricular Activities</h2><ul>";
        foreach ($profile->getExtracurricularActivities() as $acts) {
            $output .= "<li><strong>" . $acts['role'] . " at " . $acts['organization'] . " (" . $acts['start_date'] . " to " . $acts['end_date'] . ")</strong></li>";
            $output .= "<p style='margin-top: 10px; margin-bottom: 10px;'>Description: " . $acts['description'] . "</p>";
        }
        $output .= "</ul>";

        // Languages
        $output .= "<h2>Languages</h2><ul>";
        foreach ($profile->getLanguages() as $language) {
            $output .= "<li>" . $language['language'] . " (" . $language['proficiency'] . ")</li>";
        }
        $output .= "</ul>";

        // References
        $output .= "<h2>References</h2><ul>";
        foreach ($profile->getReferences() as $reference) {
            $output .= "<li><strong>" . $reference['name'] . ", " . $reference['position'] . " at " . $reference['company'] . "</strong></li>";
            $output .= "<p>Email: " . $reference['email'] . "</p>";
            $output .= "<p>Phone: " . $reference['phone_number'] . "</p>";
        }
        $output .= "</ul>";

        $this->response = $output;
    }

    public function render()
    {
        return $this->response;
    }
}
