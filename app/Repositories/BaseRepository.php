<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model as Model;
/*****************************************************************************
* Base repository
****************************************************************************
* This is base repository
* Status: Not yet complete
**************************************************************************
* @author: Nguyen
****************************************************************************/
class BaseRepository
{

    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    protected $model;
    public $remember_token=false;
    public function __construct(){
        $this->model = new Model();
    }

    /**
     * Paginate the given query.
     *
     * @param The number of models to return for pagination $n integer
     *
     * @return mixed
     */
    public function getPaginate($n)
    {
        return $this->model->paginate($n);
    }

    /**
     * Create a new model and return the instance.
     *
     * @param array $inputs
     *
     * @return Model instance
     */
    public function store(array $inputs)
    {
        return $this->model->create($inputs);
    }

     /**
     * Get all record
     *
     * @param 
     *
     * @return Model instance
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * FindOrFail Model and return the instance.
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getById($p_id)
    {
        return $this->model->find($p_id);
    }

    /**
     * Insert the model in the database.
     *
     * @param $id
     * @param array $inputs
     */
    public function insert($p_obj)
    {
       foreach ($p_obj as $key => $value) {
           $this->model->$key = $value;
       }
       return $this->model->save();
    }

    /**
     * Update the model in the database.
     *
     * @param $id
     * @param array $inputs
     */
    public function update($p_id, array $p_inputs)
    {
       return $this->getById($p_id)->update($p_inputs);
    }

    /**
     * Delete the model from the database.
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
       return $this->getById($id)->delete();
    }

    /**
     * Delete the model from the database.
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function destroyByWhere($p_arr)
    {
       return $this->model->where($p_arr)->delete();
    }

    /**
     * Function getById
     * Get an object information by its ID
     * @param array $conditons. Default value is false, means get all rows.
     * @return array of object information
     * @access public
     */
    public function getWhere($conditions = false)
    {
        if($conditions) {
            $this->model->get($conditions);
        }
        return $this->model->get();
    }
}
