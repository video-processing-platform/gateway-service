<?php

namespace App\Repository;

use App\Exceptions\CustomException;
use Exception;
use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

abstract class BaseRepository
{
    /**
     * @var Model|Authenticatable
     */
    public Model|Authenticatable $model;

    /**
     * @var Application
     */
    protected Application $app;

    /**
     * @param Application $app
     * @throws Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return Model|Authenticatable
     * @throws BindingResolutionException
     * @throws Exception
     */
    public function makeModel(): Model|Authenticatable
    {
        $model = $this->app->make($this->model());

        if (!($model instanceof Model)) {
            throw new CustomException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    abstract public function model(): string;

    /**
     * @param array $attributes
     * @return object
     */
    public function create(array $attributes): object
    {
        return $this->model->query()->create($attributes);
    }

    /**
     * @param $id
     * @param array $attributes
     * @return object
     */
    public function update($id, array $attributes): object
    {
        $data = $this->findOne($id);
        $data->update($attributes);

        return $data->refresh();
    }

    /**
     * @param int $id
     * @return object
     */
    public function findOne(int $id): object
    {
        return $this->model->query()
            ->findOrFail($id);
    }

}
