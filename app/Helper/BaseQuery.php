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
            return $model->latest()->get();
        } else {
            return $model->with($relation)->latest()->get();
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
     * get record by its slug
     */
    public function get_by_slug($model, $slug, $relation = null)
    {
        if ($relation == null) {
            return $model->whereSlug($slug)->first();
        } else {
            return $model->with($relation)->whereSlug($slug)->first();
        }
    }

    /**
     * get record by column
     */
    public function get_by_column($model, $columArr, $relation = null)
    {
        if ($relation == null) {
            return $model->where($columArr)->latest()->get();
        } else {
            return $model->with($relation)->where($columArr)->latest()->get();
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
     * get record by column
     */
    public function get_by_column_multiple($model, $column, $relation = null)
    {
        if ($relation == null) {
            return $model->where($column)->latest()->get();
        } else {
            return $model->with($relation)->where($column)->latest()->get();
        }
    }

    /**
     * delete record by its id
     */
    public function delete($model, $id)
    {
        $data = $model->find($id);

        if ($data != null) {
            return $data->delete();
        }

        return null;
    }
}
