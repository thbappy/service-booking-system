<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ServiceService
{
    public function getAllActiveServices()
    {
        return Service::where('status', true)->get();
    }

    public function createService(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return Service::create($validator->validated());
    }

    public function updateService($id, array $data)
    {
        $service = Service::findOrFail($id);

        $validator = Validator::make($data, [
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|boolean',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $service->update($validator->validated());

        return $service;
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return true;
    }
}
