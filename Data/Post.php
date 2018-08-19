<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\ThreadOwnerAvatar\Data;

class Post
{
    /**
     * @var \XF\Entity\Post|null
     */
    private $post;

    public function getPost()
    {
        $argsCount = func_num_args();

        if ($argsCount === 0) {
            return $this->post;
        } elseif ($argsCount === 1) {
            $args = func_get_args();
            $this->post = reset($args);

            return null;
        }

        throw new \InvalidArgumentException('Too many arguments.');
    }
}
