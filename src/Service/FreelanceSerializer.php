<?php
namespace App\Service;

use App\Entity\Freelance;
use App\Entity\FreelanceConso;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

readonly class FreelanceSerializer implements FreelanceSerializerInterface
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function serializeFreelance(Freelance $freelance, array $groups): string
    {
        return $this->serializer->serialize($freelance, 'json', [
            'groups' => $groups,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                return $object->getId();
            },
        ]);
    }

    #[ArrayShape([Freelance::class])]
    public function serializeFreelances(array $freelances, array $groups): string
    {
        return $this->serializer->serialize($freelances, 'json', [
            'groups' => $groups,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                return $object->getId();
            },
        ]);
    }

    #[ArrayShape([FreelanceConso::class])]
    public function serializeFreelancesConso(array $freelances, array $groups): string
    {
        return $this->serializer->serialize($freelances, 'json', [
            'groups' => $groups,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                return $object->getId();
            },
        ]);
    }
}