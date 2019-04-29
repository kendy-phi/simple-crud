<?php 
namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;
    
    public function store(array $inputs)
    {
        return $this->model->create($inputs);
    }

    public function update(array $inputs, $id)
    {
        $record = $this->getById($id);

        return $record->fill($inputs)->save();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    
    public function getByUser($id = null)
    {
        if(!empty($id))
            return $this->model->whereUserId($id)->get();
        else
            return $this->model->user;
    }
    
    public function getAll()
    {
        return $this->model->all();
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

}