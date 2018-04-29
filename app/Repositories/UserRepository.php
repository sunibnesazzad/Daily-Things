<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/1/17
 * Time: 5:12 PM
 */

namespace App\Repositories;



use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\BaseSettings\Settings;



class UserRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param       $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    public function updateUserInfo(array $data)
    {
        $user=Auth::user();
        $userInfo=UserInfo::where('user_id',$user->id)->first();
        if (is_null($userInfo)) {
            $userInfo=new UserInfo;
            $userInfo->user_id=$user->id;
        }
        $user->email=$data['email'];
        $user->name=$data['name'];
        $user->save();
        $userInfo->name=$user->name;
        $userInfo->phone=$data['phone'];
        $userInfo->occupation=$data['occupation'];
        $userInfo->about=$data['about'];
        $userInfo->save();
        return $user;
    }

    public function updateProfileName($fileName)
    {
        $user=Auth::user();
        $user->userInfo->photo = Settings::$upload_path . $fileName;
        $user->userInfo->save();
        return $user;
    }

    /**
     * @param $roleId
     * @return mixed
     */
    public function findUserIDsWithParticularRole($roleId)
    {
        return $allUserId = DB::table("model_has_roles")->where('role_id', '=', $roleId)->pluck('model_id');
    }

    /**
     * @param array $listOfId
     * @param $recordPerPage
     * @return TYPE_NAME
     */
    public function getAllUsersExceptSomeIDs($listOfId,$recordPerPage)
    {
        $users = $this->model->whereNotIn('id', $listOfId)->latest()->paginate($recordPerPage);
        /** @var Array of Object $users */
        return $users;
    }

    /**
     * @return mixed
     */
    public function getAllUsersWithAllRoles()
    {
        return $this->model->with('roles')->get();
    }

    /**
     * @param $email
     * @return bool
     */
    public function checkEmailExist($email)
    {
        return $this->model->where('email', $email)->first() ? true : false;
    }
}