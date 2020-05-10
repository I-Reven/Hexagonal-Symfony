<?php

namespace App\Infrastructure\Repository;

use App\Domain\Contract\Repository\DeveloperRepositoryContract;
use Doctrine\ORM\EntityRepository;

class DeveloperRepository extends EntityRepository implements DeveloperRepositoryContract
{

}