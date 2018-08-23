<?php
/**
 * @license
 * Copyright 2018 TruongLuu. All Rights Reserved.
 */

namespace Truonglv\ThreadOwnerAvatar\Data;

use XF\Entity\User;

class Thread
{
    /**
     * @var \XF\Entity\Thread|null
     */
    private $thread;

    public function getThread()
    {
        $argsCount = func_num_args();

        if ($argsCount === 0) {
            return $this->thread;
        } elseif ($argsCount === 1) {
            $args = func_get_args();
            $this->thread = reset($args);

            return null;
        }

        throw new \InvalidArgumentException('Too many arguments.');
    }

    public function isReplaceAvatar(User $user)
    {
        if (!$this->thread) {
            return false;
        }

        $applyNodes = \XF::options()->offsetGet('toa_applyNodes');

        return ($this->thread->user_id == $user->user_id
            && in_array($this->thread->node_id, $applyNodes)
            && \XF::app()->options()->offsetGet('toa_avatarUrl')
        );
    }
}
