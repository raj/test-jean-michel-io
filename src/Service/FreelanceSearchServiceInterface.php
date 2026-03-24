<?php
namespace App\Service;

interface FreelanceSearchServiceInterface
{
    public function searchFreelance(string $query): array;
}
