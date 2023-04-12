<?php

declare(strict_types=1);

namespace App\Services\Users;

use App\Interfaces\Requests\RequestInterface;
use App\Repositories\Appsumo\AppsumoUsersRepository;
use App\Repositories\Billing\UserPricingPlansRepository;
use App\Repositories\TeamMembers\TeamMembersRepository;
use Throwable;

class UserManageService
{
    private $userModel;

    private $request;

    private $requestData = [];

    public function __construct(
        $userModel = null,
        RequestInterface $request
    )
    {
        $this->userModel = $userModel;
        $this->request = $request;
        $this->requestData = $request->validated();
    }

    public function handleCreate()
    {
        // need to implement
    }

    public function handleUpdate()
    {
        // some logic before save and start transaction if need

        try {
            $this->userModel->update($this->requestData);
        } catch (Throwable $e) {
            throw $e;
        }

        return $this->userModel;
    }
}
