<?php

namespace Claroline\MusicInstrumentBundle\Controller\Api;

use Claroline\MusicInstrumentBundle\Entity\InstrumentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as EXT;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Instrument Type CRUD Controller.
 *
 * @EXT\Route("/instrument_types")
 */
class InstrumentTypeController extends Controller
{
    /**
     * List all Instrument Types.
     *
     * @return JsonResponse
     *
     * @EXT\Route("")
     * @EXT\Method("GET")
     */
    public function listAction()
    {
        $entities = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('InstrumentBundle:InstrumentType')
            ->findBy(['enabled' => true], ['name' => 'ASC']);

        return new JsonResponse($entities);
    }

    /**
     * Display an Instrument Type entity.
     *
     * @param InstrumentType $instrumentType
     *
     * @return JsonResponse
     *
     * @EXT\Route("/{id}", name="music_instrument_type_list")
     * @EXT\Method("GET")
     */
    public function getAction(InstrumentType $instrumentType)
    {
        return new JsonResponse($instrumentType);
    }

    /**
     * List generic Instruments for an Instrument Type entity.
     *
     * @param InstrumentType $instrumentType
     *
     * @return JsonResponse
     *
     * @EXT\Route("/{id}/instruments", name="music_instrument_list_generic")
     * @EXT\Method("GET")
     */
    public function listGenericInstrumentsAction(InstrumentType $instrumentType)
    {
        $entities = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository('ClarolineMusicInstrumentBundle:Instrument')
            ->findBy([
                'type' => $instrumentType,
                'resourceNode' => null, // Only get the platform generic Instruments
            ]);

        return new JsonResponse($entities);
    }
}
