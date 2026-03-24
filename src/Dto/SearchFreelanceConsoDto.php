<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class SearchFreelanceConsoDto
{
    public function __construct(
        #[Assert\NotBlank]
        public string $query
    )
    {
    }
}