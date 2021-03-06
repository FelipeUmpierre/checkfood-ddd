<?php

namespace Checkfood\Domain\Repository;

use Checkfood\Domain\Model\Category;
use Collections\Vector;

interface CategoryReadRepositoryInterface
{
    /**
     * @param int $id
     *
     * @return Category
     */
    public function findById(int $id): Category;

    /**
     * @return Vector
     */
    public function findAll(): Vector;

    /**
     * @param int $id
     *
     * @return Vector
     */
    public function findAllMealsByCategoryId(int $id): Vector;
}
