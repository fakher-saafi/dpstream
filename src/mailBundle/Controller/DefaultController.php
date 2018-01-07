<?php

namespace mailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use mailBundle\Entity\Mail;
use mailBundle\Form\MailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Ldap\Ldap;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        $mail = new Mail();
        $form= $this->createForm(MailType::class, $mail);
        $form->handleRequest($request) ;
        if ($form->isValid())
        {
            $message = \Swift_Message::newInstance()
                ->setSubject('Accusé de réception')
                ->setFrom('user3@nearandtravel2.com')
                ->setTo($mail->getEmail())
                ->setBody(
                    $this->renderView(
                        'mailBundle:Default:email.html.twig',
                        array('mail' => $mail->getText()) ),
                    'text/html' );
            $this->get('mailer')->send($message);
            return $this->redirect($this->generateUrl('my_app_mail_accuse'));
        }
        return $this->render('mailBundle:Default:index.html.twig', array('form'=>$form->createView()));
    }
    public function successAction()
    {
        new Ldap();
        return new Response("email envoyé avec succès, Merci de vérifier votre adresse mail.");
    }
    public function adminAction()
    {
       // return $this->render('@MyappTravel/Default/indexx.html.twig' );
    }
    public function admiAction()
    {
       // return $this->render('@MyappTravel/Default/blank.html.twig' );
    }
    public function box_mailAction()
    {
        // $user = 'user2@nearandtravel2.com';
        //$password = 'user456';
        //$mailbox = "{192.168.10.2:143/pop3}INBOX";
        //$mbx= @imap_open($mailbox , $user , $password);
        // $mails = imap_fetch_overview( $mbx,"1:5");
        $boiteMail = '192.168.10.2';
        $port = 993;
        $login = 'user3';
        $motDePasse = 'user789';

        $mbox = @imap_open('{'.$boiteMail.':'.$port.'/imap/ssl/novalidate-cert}INBOX', $login, $motDePasse);
        if (FALSE === $mbox) {
            die('La connexion a échoué. Vérifiez vos paramètres!');
        }

        echo "<h1>Connecté</h1>\n";
        $info =imap_check($mbox);
        $nbMessages = min(50, $info->Nmsgs);
        $mails = imap_fetch_overview( $mbox,"1:".$nbMessages,0);
        echo 'La boite aux lettres contient '.$info->Nmsgs.' message(s) dont '.
            $info->Recent.' recent(s)'.
            "<br />\n".
            "<br />\n";
        foreach ($mails as $mail) {
            echo $mail->from . ' ' . $mail->subject . ' ' . $mail->date . "<br />\n";
        }
        //  var_dump($mails);
        return $this->render('mailBundle:Default:box_mail.html.twig');

        //$mails = imap_search($mbx,'ALL');
        // imap_check($mbx);

        //return $this->render('@MyappTravel/Default/email.html.twig');
    }

}
