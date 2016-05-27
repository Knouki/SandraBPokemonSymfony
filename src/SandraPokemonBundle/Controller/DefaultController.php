<?php

namespace SandraPokemonBundle\Controller;

use SandraPokemonBundle\Entity\TypeDePokemons;
use SandraPokemonBundle\Form\SqlType;
use SandraPokemonBundle\Form\TypeDePokemonsLightType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('SandraPokemonBundle:Default:index.html.twig');
    }

    /**
     * @Route("/sql")
     */
    public function sqlAction(Request $request)
    {
        $sqlForm = $this->createForm(SqlType::class);
        $result = "";

        if ($request) {
            $sql = $request->get('sql');

            if ($sql != null) {
                try {
                    $conn = $this->get('database_connection');

                    $query = $conn->query(reset($sql));

                    $result = json_encode($query->fetchAll());
                } catch (\Exception $exception) {
                    $result = "Cette requête n'est pas valide.";
                }
            }
        }

        return $this->render('SandraPokemonBundle:default:sql.html.twig', array(
            'sqlForm' => $sqlForm->createView(),
            'result' => $result,
    ));

    }

    /**
     * @Route("/creation")
     */
    public function creationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $result = "";
        $pokemon = new TypeDePokemons();
        $pokemonForm = $this->createForm(TypeDePokemonsLightType::class, $pokemon);

        $zones = $em->getRepository('SandraPokemonBundle:Zones')->findAll();
        $types = $em->getRepository('SandraPokemonBundle:Types')->findAll();

        $pokemonForm->handleRequest($request);

        if ($pokemonForm->isSubmitted() && $pokemonForm->isValid()) {
            $em->persist($pokemon);
            $em->flush();

            unset($pokemon);
            unset($pokemonForm);
            $pokemon = new TypeDePokemons();
            $pokemonForm = $this->createForm(TypeDePokemonsLightType::class, $pokemon);

            $result = "Pokemon ajouté !";
        }


        return $this->render('SandraPokemonBundle:default:creation.html.twig', array(
            'pokemon' => $pokemon,
            'pokemonForm' => $pokemonForm->createView(),
            'zones' => $zones,
            'types' => $types,
            'result' => $result,
        ));
    }

}
