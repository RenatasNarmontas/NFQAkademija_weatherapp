<?php

namespace NfqAkademija\WeatherBundle\Controller;

use Cmfcmf\OpenWeatherMap;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DefaultController extends Controller
{
    // Language of data
    private $lang = 'en';
    // Units
    private $units = 'metric';

    /**
     * @Route("/city/{city}")
     * @Route("/city/")
     */
    public function indexAction($city="Vilnius")
    {
        $owm = new OpenWeatherMap();
        $weather = [];
        try {
            $weather = $owm->getWeather($city, $this->units, $this->lang, $this->container->getParameter('weather_api'));
        } catch(OWMException $e) {
            echo 'OpenWeatherMap exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        } catch(\Exception $e) {
            echo 'General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').';
        }

        return $this->render('WeatherBundle:Default:index.html.twig', [
            "city" => $city,
            "cityNameDetected" => $weather->city->name,
            "cityCountryDetected" => $weather->city->country,
            "weather" => $weather->temperature,
            "lastUpdate" => $weather->lastUpdate->format('Y-m-d H:i:s T'),
            "cloudsValue" => $weather->clouds->getValue(),
            "cloudsDescription" => $weather->clouds->getDescription(),
            "humidity" => $weather->humidity,
            "pressure" => $weather->pressure,
            "windSpeed" => $weather->wind->speed,
            "windDirection" => $weather->wind->direction,
            "sunRise" => $weather->sun->rise->format('Y-m-d H:i:s T'),
            "sunSet" => $weather->sun->set->format('Y-m-d H:i:s T'),
        ]);
    }
}
