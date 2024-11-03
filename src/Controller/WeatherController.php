<?php

namespace App\Controller;

use App\Entity\Location; // use statment!
use App\Repository\LocationRepository;
use App\Repository\MeasurementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WeatherController extends AbstractController
{
    #[Route('/weather/{city}/{countryCode?}', name: 'app_weather', requirements: ['countryCode' => '[A-Z]{2}'])]
    public function city(string $city, ?string $countryCode, LocationRepository $locationRepository, MeasurementRepository $repository): Response
    {
        $location = $countryCode ?
            $locationRepository->findOneBy(['city' => $city, 'country' => strtoupper($countryCode)]) :
            $locationRepository->findOneBy(['city' => $city]);

        if (!$location) {
            throw $this->createNotFoundException('Location not found');
        }

        $measurements = $repository->findByLocation($location);

        return $this->render('weather/city.html.twig', [
            'location' => $location,
            'measurements' => $measurements,
        ]);
    }
}

