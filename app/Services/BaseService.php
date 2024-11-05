<?php

namespace App\Services;

class BaseService {
    protected $model;

    public function create($data) {
        $this->model->create($data);
    }

    public function read() {
        $items = $this->model::all();
        return $items;
    }

    public function get($id, $slug) {
        if ($slug) {
            $item = $this->model::where("slug", $id)->firstOrFail();
        } else {
            $item = $this->model::findOrFail($id);
        }
        return $item;
    }

    public function update($id, $data) {
        $item = $this->model->findOrFail($id);

        $item->update($data);
    }

    public function delete($id) {
        $item = $this->model->findOrFail($id);

        $item->delete();
    }
}