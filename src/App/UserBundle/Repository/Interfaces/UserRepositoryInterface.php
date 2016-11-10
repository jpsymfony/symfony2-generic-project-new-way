<?php

namespace App\UserBundle\Repository\Interfaces;

use App\UserBundle\Repository\UserRepository;
use Doctrine\ORM\QueryBuilder;

interface UserRepositoryInterface
{
    /**
     * @param QueryBuilder $qb
     * @param $identifier
     * @return UserRepository
     */
    public function getUserByIdentifierQueryBuilder(QueryBuilder &$qb, $identifier);

    /**
     * @param $identifier
     * @return mixed
     */
    public function getUserByEmailOrUsername($identifier);
}
