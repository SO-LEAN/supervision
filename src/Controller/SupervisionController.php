<?php

/*
 * This file is part of the SUPERVISION package.
 *
 * (c) PHPPRO <opensource@phppro.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phppro\Supervision\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use /** @noinspection PhpUnusedAliasInspection */ Nelmio\ApiDocBundle\Annotation\ApiDoc;
use /** @noinspection PhpUnusedAliasInspection */ Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use /** @noinspection PhpUnusedAliasInspection */ Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Supervision management controller.
 *
 * @author Olivier Hoareau <olivier@phppro.fr>
 */
class SupervisionController extends Controller
{
    /**
     * @Route("/supervision/ping", name="supervision_ping")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Supervision",
     *  description="Ping",
     *  statusCodes={
     *    200="OK"
     *  },
     *  views = { "infra" }
     * )
     *
     * @return Response
     */
    public function pingAction()
    {
        return new JsonResponse($this->get('supervision')->ping(), 200);
    }
    /**
     * @Route("/supervision/whoami", name="supervision_whoami")
     * @Method({"GET"})
     *
     * @ApiDoc(
     *  section="Supervision",
     *  description="Who am I",
     *  statusCodes={
     *    200="OK"
     *  },
     *  views = { "infra" }
     * )
     *
     * @return Response
     */
    public function whoamiAction()
    {
        return new JsonResponse($this->get('supervision')->getIdentity(), 200);
    }
}
