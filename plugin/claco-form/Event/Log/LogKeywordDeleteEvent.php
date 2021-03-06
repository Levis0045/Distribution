<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\ClacoFormBundle\Event\Log;

use Claroline\CoreBundle\Event\Log\LogGenericEvent;

class LogKeywordDeleteEvent extends LogGenericEvent
{
    const ACTION = 'clacoformbundle-keyword-delete';

    public function __construct(array $details)
    {
        parent::__construct(self::ACTION, $details);
    }

    /**
     * @return array
     */
    public static function getRestriction()
    {
        return [self::DISPLAYED_WORKSPACE];
    }
}
