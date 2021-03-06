<?php namespace Fenos\Notifynder\Categories;

use Fenos\Notifynder\Contracts\CategoryDB;
use Fenos\Notifynder\Contracts\NotifynderCategory;
use Fenos\Notifynder\Exceptions\CategoryNotFoundException;

/**
 * Class CategoryManager
 *
 * The CategoryManager is responsable to deal
 * with the notification categories
 *
 * @package Fenos\Notifynder\Categories
 */
class CategoryManager implements NotifynderCategory
{

    /**
     * @var CategoryDB
     */
    protected $categoryRepo;

    /**
     * @param CategoryDB $categoryRepo
     */
    public function __construct(CategoryDB $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Find a category by name
     *
     * @param $name
     * @throws CategoryNotFoundException
     * @return mixed
     */
    public function findByName($name)
    {
        $category = $this->categoryRepo->findByName($name);

        if (is_null($category)) {
            $error = "Category Not Found";
            throw new CategoryNotFoundException($error);
        }

        return $category;
    }

    /**
     * Find categories by names,
     * pass the name as an array
     *
     * @param $name
     * @throws CategoryNotFoundException
     * @return mixed
     */
    public function findByNames(array $name)
    {
        $category = $this->categoryRepo->findByNames($name);

        if (count($category) == 0) {
            $error = "Category Not Found";
            throw new CategoryNotFoundException($error);
        }

        return $category;
    }

    /**
     * Find a category by id
     *
     * @param $id
     * @throws CategoryNotFoundException
     * @return mixed
     */
    public function find($id)
    {
        $category = $this->categoryRepo->find($id);

        if (is_null($category)) {
            $error = "Category Not Found";
            throw new CategoryNotFoundException($error);
        }

        return $category;
    }

    /**
     * Add a category to the DB
     *
     * @param  array                                         $name
     * @param                                                $text
     * @return \Fenos\Notifynder\Models\NotificationCategory
     */
    public function add($name, $text)
    {
        return $this->categoryRepo->add($name, $text);
    }

    /**
     * Delete category by ID
     *
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->categoryRepo->delete($id);
    }

    /**
     * Delete category by name
     *
     * @param $name
     * @return mixed
     */
    public function deleteByName($name)
    {
        return $this->categoryRepo->deleteByName($name);
    }

    /**
     * Update a category
     *
     * @param  array $data
     * @param        $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->categoryRepo->update($data, $id);
    }
}
