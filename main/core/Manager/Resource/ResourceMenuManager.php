<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\CoreBundle\Manager\Resource;

use Claroline\CoreBundle\Entity\Resource\MenuAction;
use Claroline\CoreBundle\Entity\Resource\ResourceNode;
use Claroline\CoreBundle\Persistence\ObjectManager;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("claroline.manager.resource_menu_manager")
 */
class ResourceMenuManager
{
    /** @var ObjectManager */
    private $om;

    /**
     * ResourceMenuManager constructor.
     *
     * @DI\InjectParams({
     *      "om" = @DI\Inject("claroline.persistence.object_manager")
     * })
     *
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * @param ResourceNode $resourceNode
     *
     * @return MenuAction[]
     */
    public function getMenus(ResourceNode $resourceNode)
    {
        return array_merge(
            // actions of the resource type
            $resourceNode->getResourceType()->getActions()->toArray(),
            // generic actions available for all resource types
            $this->om->getRepository('ClarolineCoreBundle:Resource\MenuAction')->findBy(['resourceType' => null])
        );
    }
}
