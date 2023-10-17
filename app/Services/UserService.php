<?php

namespace App\Services;

use App\Helper\BaseQuery;
use App\Helper\ImageUpload;
use App\Models\User;

class UserService
{
    use BaseQuery, ImageUpload;

    private $_imgPath = 'users/';

    private $_model = null;

    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct()
    {
        $this->_model = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->_model->whereHas('roles', function ($q) {
            $q->where('name', '!=', 'admin');
        })->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($data)
    {
        return $this->add($this->_model, $data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->get_by_id($this->_model, $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, $data)
    {
        unset($data['email']);

        $user = $this->get_by_id($this->_model, $id);

        if (request()->hasFile('image')) {
            if ($user->images != null) {
                $this->deleteImage($user->images->url);
                $user->images()->delete();
            }

            $imageUploaded = $this->uploadImage($data['image'], $this->_imgPath);
            $user->images()->create($imageUploaded);
        }

        return $user->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->delete($this->_model, $id);
    }

    private function validateEmail($email)
    {
        $this->get_by_column_single($this->_model, ['email' => $email]);

        if ($email != null) {
            return false;
        } else {
            return true;
        }
    }
}
