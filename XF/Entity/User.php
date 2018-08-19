<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\ThreadOwnerAvatar\XF\Entity;

use Truonglv\ThreadOwnerAvatar\Data\Post;

/**
 * Class User
 * @package Truonglv\ThreadOwnerAvatar\XF\Entity
 * @inheritdoc
 */
class User extends XFCP_User
{
    public function getAvatarUrl($sizeCode, $forceType = null, $canonical = false)
    {
        /** @var Post $postData */
        $postData = $this->app()->data('Truonglv\ThreadOwnerAvatar:Post');
        /** @var \XF\Entity\Post|null $post */
        $post = $postData->getPost();
        if ($post
            && $post->user_id == $this->user_id
            && $this->app()->options()->offsetGet('toa_avatarUrl')
        ) {
            return $this->app()->options()->offsetGet('toa_avatarUrl');
        }

        return parent::getAvatarUrl($sizeCode, $forceType, $canonical);
    }
}
