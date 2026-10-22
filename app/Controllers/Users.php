<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('users/index', ['title' => 'User Accounts', 'users' => $this->userModel->orderBy('full_name', 'ASC')->findAll()]);
    }

    public function new()
    {
        return view('users/form', ['title' => 'Add User', 'heading' => 'Add New User', 'user' => null, 'action' => base_url('users/create')]);
    }

    public function create()
    {
        $data = $this->request->getPost(['username', 'full_name', 'role']);
        if (! $this->userModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }
        return redirect()->to('/users')->with('success', 'User added successfully.');
    }

    public function edit(int $id)
    {
        $user = $this->userModel->find($id);
        if (! $user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found.');
        }
        return view('users/form', ['title' => 'Edit User', 'heading' => 'Edit User', 'user' => $user, 'action' => base_url('users/update/' . $id)]);
    }

    public function update(int $id)
    {
        $user = $this->userModel->find($id);
        if (! $user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found.');
        }

        $data = $this->request->getPost(['username', 'full_name', 'role']);
        $duplicate = $this->userModel->where('username', $data['username'] ?? '')->where('id !=', $id)->first();
        if ($duplicate) {
            return redirect()->back()->withInput()->with('errors', ['username' => 'The username is already in use.']);
        }

        $avatar = $this->request->getFile('avatar');
        if ($avatar && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            if (! $avatar->isValid() || ! $this->validate(['avatar' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'])) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $filename = $avatar->getRandomName();
            $uploadPath = FCPATH . 'uploads/avatars';
            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            $avatar->move($uploadPath, $filename);
            service('image')->withFile($uploadPath . DIRECTORY_SEPARATOR . $filename)->fit(300, 300)->save($uploadPath . DIRECTORY_SEPARATOR . $filename);

            if (! empty($user['avatar']) && is_file($uploadPath . DIRECTORY_SEPARATOR . $user['avatar'])) {
                unlink($uploadPath . DIRECTORY_SEPARATOR . $user['avatar']);
            }
            $data['avatar'] = $filename;
        }

        if (! $this->userModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }
        return redirect()->to('/users')->with('success', 'User updated successfully.');
    }
}
