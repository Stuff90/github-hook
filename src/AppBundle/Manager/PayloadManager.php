<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Payload;
use Doctrine\ORM\EntityManagerInterface;

/**
 * UserManager
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PayloadManager
{
    private $em;
    private $payloadRepository;

    public function __construct( EntityManagerInterface $em )
    {
        $this->em = $em;
        $this->payloadRepository = $this->em->getRepository('AppBundle:Payload');
    }

    public function getPayloadFromRawPayload( $rawPayload )
    {
        $payload = new Payload();

        $payload
            ->setRef($rawPayload->ref)
            ->setForced($rawPayload->forced)
            ->setAfterSha($rawPayload->after)
            ->setCreated($rawPayload->created)
            ->setDeleted($rawPayload->deleted)
            ->setCompare($rawPayload->compare)
            ->setBaseRef($rawPayload->base_ref)
            ->setBeforeSha($rawPayload->before);

        $this->em->persist($payload);
        $this->em->flush();

        return $payload;
    }

}
