<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    protected CustomerModel $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        return view('customers/index', [
            'title' => 'Customer Accounts',
            'customers' => $this->customerModel->orderBy('full_name', 'ASC')->findAll(),
        ]);
    }

    public function new()
    {
        return view('customers/form', ['title' => 'Add Customer', 'heading' => 'Add New Customer', 'customer' => null, 'action' => base_url('customers/create')]);
    }

    public function create()
    {
        $data = $this->request->getPost(['full_name', 'email', 'phone']);
        if (! $this->customerModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $this->customerModel->errors());
        }
        return redirect()->to('/customers')->with('success', 'Customer added successfully.');
    }

    public function edit(int $id)
    {
        $customer = $this->customerModel->find($id);
        if (! $customer) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found.');
        }
        return view('customers/form', ['title' => 'Edit Customer', 'heading' => 'Edit Customer', 'customer' => $customer, 'action' => base_url('customers/update/' . $id)]);
    }

    public function update(int $id)
    {
        if (! $this->customerModel->find($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found.');
        }
        $data = $this->request->getPost(['full_name', 'email', 'phone']);
        if (! $this->customerModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->customerModel->errors());
        }
        return redirect()->to('/customers')->with('success', 'Customer updated successfully.');
    }
}
