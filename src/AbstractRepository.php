<?php

namespace JK\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Persistence\ManagerRegistry;

abstract class AbstractRepository extends ServiceEntityRepository implements RepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->getEntityClass());
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null): Collection
    {
        $results = parent::findBy($criteria, $orderBy, $limit, $offset);

        return $this->createCollection($results);
    }

    public function findAll(): Collection
    {
        $results = parent::findAll();

        return $this->createCollection($results);
    }

    public function save($entity): void
    {
        $this->_em->persist($entity);
        $this->_em->flush();
    }

    protected function createCollection($results): Collection
    {
        if ($results instanceof Collection) {
            return $results;
        }

        return new ArrayCollection($results);
    }
}
