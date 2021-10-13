<?php

namespace App\AdminSystem\User;

use App\Model\RoleModel;

class ModeratorUser extends AbstractUser implements ModeratorInterface
{

//    public function create(): bool
//    {
//
//    }
//
//    public function updateUserRole($userId, bool $admin, bool $moderator, bool $editor, bool $user)
//    {
//        $userRole = RoleModel::getRoleByUserId($userId);
//        if($userRole['admin'] == true){
//            print "Bu işlem için yetkiniz yok";
//        }else{
//            RoleModel::updateRole($userId, $admin, $moderator, $editor, $user);
//        }
//    }
//
//    public function delete($userId): bool
//    {
//
//    }
//
//    public function givePermission($userId, bool $moderator, bool $editor, bool $user)
//    {
//            RoleModel::createRole($userId, 0, $moderator, $editor, $user);
//
//    }

}