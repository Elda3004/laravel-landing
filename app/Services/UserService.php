<?php
namespace App\Services;

use App\Models\User;
use App\Interfaces\UserSubmissionInterface;

class UserService implements UserSubmissionInterface
{   
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $requestData)
    {
        $companyService = new CompanyService();
        $addressService = new AddressService();

        try {
            \DB::beginTransaction();
            $user = $this->user->create($requestData);
            $user->company()->create($requestData['company']);
            $user->address()->create($requestData['address'] + [
                'zip_code' => $requestData['address']['zipcode'],
            ]);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw new \Exception($e);
        }

        return $user;
    }
}