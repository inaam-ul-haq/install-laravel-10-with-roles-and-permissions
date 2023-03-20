<?php

namespace App\Helper;

trait BaseQuery
{
    /**
     * add new record
     */
    public function add($model, $data)
    {
        return $model->create($data);
    }

    /**
     * get all record
     */
    public function get_all($model, $relation = null)
    {
        if ($relation == null) {
            return $model->all();
        } else {
            return $model->with($relation)->get();
        }
    }

    /**
     * get record by its id
     */
    public function get_by_id($model, $id, $relation = null)
    {
        if ($relation == null) {
            return $model->find($id);
        } else {
            return $model->with($relation)->first($id);
        }
    }

    /**
     * get record by column
     */
    public function get_by_column($model, $columArr, $relation = null)
    {
        if ($relation == null) {
            return $model->where($columArr)->get();
        } else {
            return $model->with($relation)->where($columArr)->get();
        }
    }

    /**
     * get record by column single
     */
    public function get_by_column_single($model, $columArr, $relation = null)
    {
        if ($relation == null) {
            return $model->where($columArr)->first();
        } else {
            return $model->with($relation)->where($columArr)->first();
        }
    }

    /**
     * delete record by its id
     */
    public function delete($model, $id)
    {
        return $model->findOrFail($id)->delete();
    }
}
