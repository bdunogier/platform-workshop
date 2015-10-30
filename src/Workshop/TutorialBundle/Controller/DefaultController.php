<?php

namespace Workshop\TutorialBundle\Controller;

use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;

class DefaultController extends Controller
{
    public function helloAction($name)
    {
        return $this->render('WorkshopTutorialBundle:Default:hello.html.twig', array('name' => $name));
    }

    public function listRidesAction(ContentView $view)
    {
        $searchService = $this->get('ezpublish.api.service.search');

        $query = new LocationQuery();
        $query->filter = new Criterion\LogicalAnd([
            new Criterion\Visibility(Criterion\Visibility::VISIBLE),
            new Criterion\ContentTypeIdentifier('ride'),
        ]);
        $query->sortClauses = [new SortClause\DatePublished()];
        $result = $searchService->findLocations($query);

        $view->addParameters(['rides_list' => $result->searchHits]);

        return $view;
    }
}
