<?php
namespace App\Service;

use App\Repository\FreelanceConsoRepository;


readonly class FreelanceSearchService implements FreelanceSearchServiceInterface
{
    public function __construct(
        private FreelanceConsoRepository $freelanceConsoRepository,
    )
    {
    }

    public function searchFreelance(string $query): array
    {
        return $this->freelanceConsoRepository->search($query);
    }
}