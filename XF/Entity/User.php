<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\ThreadOwnerAvatar\XF\Entity;

use Truonglv\ThreadOwnerAvatar\Data\Thread;

/**
 * Class User
 * @package Truonglv\ThreadOwnerAvatar\XF\Entity
 * @inheritdoc
 */
class User extends XFCP_User
{
    public function getAvatarType()
    {
        /** @var Thread $data */
        $data = $this->app()->data('Truonglv\ThreadOwnerAvatar:Thread');

        if ($data->isReplaceAvatar($this)) {
            return 'custom';
        }

        return parent::getAvatarType();
    }

    public function getAvatarUrl($sizeCode, $forceType = null, $canonical = false)
    {
        /** @var Thread $data */
        $data = $this->app()->data('Truonglv\ThreadOwnerAvatar:Thread');

        if ($data->isReplaceAvatar($this)) {
            return $this->app()->options()->offsetGet('toa_avatarUrl');
        }

        return parent::getAvatarUrl($sizeCode, $forceType, $canonical);
    }
}
