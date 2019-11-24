<?php

namespace JK\Repository;

interface RepositoryInterface
{
    public function getEntityClass(): string;

    public function save($entity): void;
}
