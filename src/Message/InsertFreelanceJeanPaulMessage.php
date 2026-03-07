<?php

namespace App\Message;

use App\Dto\FreelanceJeanPaulDto;
use Symfony\Component\Validator\Constraints as Assert;

final class InsertFreelanceJeanPaulMessage
{
     public function __construct(
         #[Assert\Valid]
         public FreelanceJeanPaulDto $dto
     ) {
     }
}
