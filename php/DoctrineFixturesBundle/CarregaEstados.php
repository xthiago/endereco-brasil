<?php

namespace Acme\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Acme\DemoBundle\Entity\Estado;

class CarregaEstados extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $estados = $this->getEstados();

        foreach ($estados as $estado) {

            $e = new Estado();
            $e->setId($estado['id']);
            $e->setSigla($estado['sigla']);
            $e->setNome($estado['nome']);

            $manager->persist($e);
        }

        // desativa geração automática do ID
        $metadata = $manager->getClassMetaData('Acme\DemoBundle\Entity\Estado');
        $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);

        $manager->flush();
    }

    public function getEstados()
    {
        $estados = array(
            array('id' => 1, 'sigla' => 'AC', 'nome' => 'Acre'),
            array('id' => 2, 'sigla' => 'AL', 'nome' => 'Alagoas'),
            array('id' => 3, 'sigla' => 'AM', 'nome' => 'Amazonas'),
            array('id' => 4, 'sigla' => 'AP', 'nome' => 'Amapá'),
            array('id' => 5, 'sigla' => 'BA', 'nome' => 'Bahia'),
            array('id' => 6, 'sigla' => 'CE', 'nome' => 'Ceará'),
            array('id' => 7, 'sigla' => 'DF', 'nome' => 'Distrito Federal'),
            array('id' => 8, 'sigla' => 'ES', 'nome' => 'Espírito Santo'),
            array('id' => 9, 'sigla' => 'GO', 'nome' => 'Goiás'),
            array('id' => 10, 'sigla' => 'MA', 'nome' => 'Maranhão'),
            array('id' => 11, 'sigla' => 'MG', 'nome' => 'Minas Gerais'),
            array('id' => 12, 'sigla' => 'MS', 'nome' => 'Mato Grosso do Sul'),
            array('id' => 13, 'sigla' => 'MT', 'nome' => 'Mato Grosso'),
            array('id' => 14, 'sigla' => 'PA', 'nome' => 'Pará'),
            array('id' => 15, 'sigla' => 'PB', 'nome' => 'Paraíba'),
            array('id' => 16, 'sigla' => 'PE', 'nome' => 'Pernambuco'),
            array('id' => 17, 'sigla' => 'PI', 'nome' => 'Piauí'),
            array('id' => 18, 'sigla' => 'PR', 'nome' => 'Paraná'),
            array('id' => 19, 'sigla' => 'RJ', 'nome' => 'Rio de Janeiro'),
            array('id' => 20, 'sigla' => 'RN', 'nome' => 'Rio Grande do Norte'),
            array('id' => 21, 'sigla' => 'RO', 'nome' => 'Rondônia'),
            array('id' => 22, 'sigla' => 'RR', 'nome' => 'Roraima'),
            array('id' => 23, 'sigla' => 'RS', 'nome' => 'Rio Grande do Sul'),
            array('id' => 24, 'sigla' => 'SC', 'nome' => 'Santa Catarina'),
            array('id' => 25, 'sigla' => 'SE', 'nome' => 'Sergipe'),
            array('id' => 26, 'sigla' => 'SP', 'nome' => 'São Paulo'),
            array('id' => 27, 'sigla' => 'TO', 'nome' => 'Tocantins'),
        );

        return $estados;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}