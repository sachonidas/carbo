<?php

namespace CarboBundle\Repository;

/**
 * HidratoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class HidratoRepository extends \Doctrine\ORM\EntityRepository
{
    public function getPesoMedio(){
        $em = $this->getEntityManager();

        $dql = "SELECT AVG(h.peso) FROM CarboBundle\Entity\Hidrato h";

        $query = $em->createQuery($dql)
            ->getSingleScalarResult();

        $pesoMedio = $query;
        return $pesoMedio;
    }

    public function getHidratoMedio(){
        $em = $this->getEntityManager();

        $dql = "SELECT AVG(h.hidratoCarbono) FROM CarboBundle\Entity\Hidrato h";

        $query = $em->createQuery($dql)
            ->getSingleScalarResult();

        $hidratoMedio = $query;
        return $hidratoMedio;
    }

    public function getHorasMedia(){
        $em = $this->getEntityManager();

        $dql = "SELECT AVG(h.horasEntreno) FROM CarboBundle\Entity\Hidrato h";

        $query = $em->createQuery($dql)
            ->getSingleScalarResult();

        $horasMedia = $query;
        return $horasMedia;
    }


}
