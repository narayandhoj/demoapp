<?php
namespace App\Repositories;

use DB;

class Repository
{
    protected $model;

    public function with($with=[])
    {
        return $this->model->with($with);
    }

    public function all() {
        return $this->model->all();
    }

    public function allWith($with=[]) {
        return $this->with($with)->get();
    }

    public function paginate($paginate) {
        return $this->model->paginate($paginate);
    }

    public function where($field, $value) {
        return $this->model->where($field, $value);
    }

    public function whereNot($field, $value) {
        return $this->model->where($field,'<>',$value);
    }

    public function whereIn($field, $array) {
        return $this->model->whereIn($field, $array);
    }

    public function whereNotIn($field, $array)
    {
        return $this->model->whereNotIn($field, $array);
    }

    public function count() {
        return $this->model->count();
    }

    public function find($id) {
        return $this->model->findOrFail($id);
    }

    public function findWith($id, $with=[]) {
        return $this->with($with)->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        DB::beginTransaction();
        try {
            $record = $this->model->findOrFail($id);
            $record->fill($data)->save();
            DB::commit();
            return $record;
            
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function updateAll($data)
    {
        DB::beginTransaction();
        try {
            $record = $this->model->update($data);
            DB::commit();
            return $record;
            
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $result = $this->model->findOrFail($id)->delete();
            DB::commit();
            return $result;
            
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function findByField($field, $value = null, $columns = ['*'])
    {
        return $this->model->where($field, '=', $value)->first($columns);
    }

    public function sortOrder($replaceString, $data)
    {
        DB::beginTransaction();
        try {
            $models = explode('&', str_replace($replaceString, '', $data));
            $position = 1;
            foreach ($models as $modelId) {
                $model = $this->model->find($modelId);
                $model->order_position = $position;
                $model->save();
                $position++;
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function orderby($field, $type='desc')
    {
        return $this->model->orderby($field, $type);
    }

    public function groupBy($field)
    {
        return $this->model->groupBy($field);
    }

    public function distinct($field)
    {
        return $this->model->distinct()->get([$field]);
    }

    public function max($field)
    {
        return $this->model->max($field);
    }

    public function select($fields)
    {
        return $this->model->select($fields);
    }
}