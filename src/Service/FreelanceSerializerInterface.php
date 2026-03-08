<?php
namespace App\Service;

use App\Entity\Freelance;

interface FreelanceSerializerInterface
{
    public function serializeFreelance(Freelance $freelance, array $groups): string;
    public function serializeFreelances(array $freelances, array $groups): string;
    public function serializeFreelancesConso(array $freelances, array $groups): string;
}
