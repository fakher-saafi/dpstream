<?php

namespace MongoBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MongoBundle\Document\Movie;
use MongoBundle\Form\MovieType;

/**
 * Movie controller.
 */
class MovieController extends Controller
{
    /**
     * Lists all Movie documents.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $dm = $this->getDocumentManager();

        $documents = $dm->getRepository('MongoBundle:Movie')->findAll();

        return $this->render('MongoBundle:Movie:index.html.twig', array('documents' => $documents));
    }

    /**
     * Displays a form to create a new Movie document.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction()
    {
        $document = new Movie();
        $form = $this->createForm(MovieType::class, $document);

        return $this->render('MongoBundle:Movie:new.html.twig', array(
            'document' => $document,
            'form'     => $form->createView()
        ));
    }

    /**
     * Creates a new Movie document.
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $document = new Movie();
        $form     = $this->createForm(MovieType::class, $document);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->getDocumentManager();
            $dm->persist($document);
            $dm->flush();

            return $this->redirect($this->generateUrl('movie_show', array('id' => $document->getId())));
        }

        return $this->render('MongoBundle:Movie:new.html.twig', array(
            'document' => $document,
            'form'     => $form->createView()
        ));
    }

    /**
     * Finds and displays a Movie document.
     *
     * @param string $id The document ID
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException If document doesn't exists
     */
    public function showAction($id)
    {
        $dm = $this->getDocumentManager();

        $document = $dm->getRepository('MongoBundle:Movie')->find($id);

        if (!$document) {
            throw $this->createNotFoundException('Unable to find Movie document.');
        }

        $deleteForm = $this->createDeleteForm($id);


        return $this->render('MongoBundle:Movie:show.html.twig', array(
            'document' => $document,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Movie document.
     *
     * @param string $id The document ID
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException If document doesn't exists
     */
    public function editAction($id)
    {
        $dm = $this->getDocumentManager();

        $document = $dm->getRepository('MongoBundle:Movie')->find($id);

        if (!$document) {
            throw $this->createNotFoundException('Unable to find Movie document.');
        }

        $editForm = $this->createForm(MovieType::class, $document);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MongoBundle:Movie:edit.html.twig', array(
            'document'    => $document,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Movie document.
     *
     * @param Request $request The request object
     * @param string $id       The document ID
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException If document doesn't exists
     */
    public function updateAction(Request $request, $id)
    {
        $dm = $this->getDocumentManager();

        $document = $dm->getRepository('MongoBundle:Movie')->find($id);

        if (!$document) {
            throw $this->createNotFoundException('Unable to find Movie document.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm   = $this->createForm(MovieType::class, $document);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $dm->persist($document);
            $dm->flush();

            return $this->redirect($this->generateUrl('movie_edit', array('id' => $id)));
        }

        return $this->render('MongoBundle:Movie:edit.html.twig', array(
            'document'    => $document,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Movie document.
     *
     * @param Request $request The request object
     * @param string $id       The document ID
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException If document doesn't exists
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->getDocumentManager();
            $document = $dm->getRepository('MongoBundle:Movie')->find($id);

            if (!$document) {
                throw $this->createNotFoundException('Unable to find Movie document.');
            }

            $dm->remove($document);
            $dm->flush();
        }

        return $this->redirect($this->generateUrl('movie'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', HiddenType::class)
            ->getForm()
        ;
    }

    /**
     * Returns the DocumentManager
     *
     * @return DocumentManager
     */
    private function getDocumentManager()
    {
        return $this->get('doctrine.odm.mongodb.document_manager');
    }
}
