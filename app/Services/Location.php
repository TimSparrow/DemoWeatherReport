<?php

namespace App\Services;

class Location
{
    public function __construct(
        private string $city,
        private string $country,
        private ?string $state,
        private ?string $zip,
        private ?string $region
    ) {}


    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): Location
    {
        $this->zip = $zip;
        return $this;
    }



    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setCity(string $city): Location
    {
        $this->city = $city;
        return $this;
    }

    public function setCountry(string $country): Location
    {
        $this->country = $country;
        return $this;
    }

    public function setState(?string $state): Location
    {
        $this->state = $state;
        return $this;
    }

    public function setRegion(?string $region): Location
    {
        $this->region = $region;
        return $this;
    }
}
