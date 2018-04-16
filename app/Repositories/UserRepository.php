<?php
/**
 * User: Nhan Viet Vang
 * Date: 04/16/2018
 * Time: 4:13 PM
 */
namespace App\Repositories;
use App\Models\User;


class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model=new User();
    }
}