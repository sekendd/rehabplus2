<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    // ======================================================
    // USERS PAGE
    // ======================================================

    public function index()
    {
        $model = new UserModel();

        $data = $model->findAll();

        return view('users/index', [
            'users' => $data
        ]);
    }


    // ======================================================
    // CREATE STAFF PAGE
    // ======================================================

    public function create()
    {
        return view('users/form', [
            'user'   => null,
            'errors' => []
        ]);
    }


    // ======================================================
    // STORE STAFF ACCOUNT
    // ======================================================

    public function store()
    {
        $model = new UserModel();

        $role = $this->request->getPost('role');

        // DEFAULT ROLE

        if (empty($role)) {
            $role = 'staff';
        }

        $data = [

            'name' => $this->request->getPost('name'),

            'email' => $this->request->getPost('email'),

            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),

            'role' => $role,

            'is_active' => 1

        ];

        $model->insert($data);

        return redirect()
            ->to(site_url('users'))
            ->with('success', 'Account created successfully.');
    }


    // ======================================================
    // CREATE PATIENT ACCOUNT
    // ======================================================

    public function createPatient()
    {
        $model = new UserModel();

        $data = [

            'name' => $this->request->getPost('name'),

            'email' => $this->request->getPost('email'),

            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),

            // FORCE PATIENT ROLE

            'role' => 'patient',

            'is_active' => 1

        ];

        $model->insert($data);

        return redirect()
            ->to(site_url('users'))
            ->with('success', 'Patient account created successfully.');
    }


    // ======================================================
    // EDIT USER
    // ======================================================

    public function edit($id)
    {
        $user = (new UserModel())->find($id);

        if (! $user) {

            return redirect()->to(site_url('users'));
        }

        return view('users/form', [

            'user'   => $user,
            'errors' => []

        ]);
    }


    // ======================================================
    // UPDATE USER
    // ======================================================

    public function update($id)
    {
        $model = new UserModel();

        $data = [

            'name' => $this->request->getPost('name'),

            'email' => $this->request->getPost('email'),

            'role' => $this->request->getPost('role'),

        ];

        $password = $this->request->getPost('password');

        if (! empty($password)) {

            $data['password'] = password_hash(
                $password,
                PASSWORD_DEFAULT
            );
        }

        $model->update($id, $data);

        return redirect()
            ->to(site_url('users'))
            ->with('success', 'User updated successfully.');
    }


    // ======================================================
    // DELETE USER
    // ======================================================

    public function delete($id)
    {
        (new UserModel())->delete($id);

        return redirect()
            ->to(site_url('users'))
            ->with('success', 'User deleted.');
    }
}