<?php

namespace Checkfood\Business\Handler\Category;

use Checkfood\Business\Command\Category\UpdateCategoryCommand;
use Checkfood\Domain\Repository\CategoryReadRepositoryInterface;
use Checkfood\Domain\Repository\CategoryWriteRepositoryInterface;

final class UpdateCategoryHandler
{
    /**
     * @var CategoryWriteRepositoryInterface
     */
    protected $categoryWriteRepository;

    /**
     * @var CategoryReadRepositoryInterface
     */
    protected $categoryReadRepository;

    /**
     * UpdateCategoryHandler constructor.
     *
     * @param CategoryWriteRepositoryInterface $categoryWriteRepository
     * @param CategoryReadRepositoryInterface $categoryReadRepository
     */
    public function __construct(
        CategoryWriteRepositoryInterface $categoryWriteRepository,
        CategoryReadRepositoryInterface $categoryReadRepository
    ) {
        $this->categoryWriteRepository = $categoryWriteRepository;
        $this->categoryReadRepository = $categoryReadRepository;
    }

    /**
     * @param UpdateCategoryCommand $command
     *
     * @return mixed
     */
    public function handle(UpdateCategoryCommand $command)
    {
        $category = $this->categoryReadRepository->findById($command->id);
        if (empty($category)) {
            throw new \InvalidArgumentException(sprintf('Category `%d` not found.', $command->id));
        }

        return $this->categoryWriteRepository->update($category);
    }
}