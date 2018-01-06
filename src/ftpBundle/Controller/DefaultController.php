<?php

namespace ftpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ijanki\Bundle\FtpBundle\Exception\FtpException;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $files = "";
        try {
            $ftp = $this->container->get('ijanki_ftp');
            $ftp->connect("192.168.1.5");
            $ftp->login("user1","user1");
            $files = $ftp->nlist('.');
        } catch (FtpException $e) {
            echo 'Error: ', $e->getMessage();
        }
        return $this->render('@ftp/Default/index.html.twig',['files'=>$files]);
    }
    public function uploadAction()
    {
        try {
            $ftp = $this->container->get('ijanki_ftp');
            $ftp->connect("192.168.1.5");
            $ftp->login("user1", "user1");
            $destination_file = $_FILES["file"]["name"];
            $source_file = $_FILES["file"]["tmp_name"];
            $ftp->put($destination_file, $source_file, FTP_BINARY);
        } catch (FtpException $e) {
            echo 'Error: ', $e->getMessage();
        }
        return $this->redirectToRoute('ftp_homepage');
    }
    public function downloadAction()
    {
        try {
            $ftp = $this->container->get('ijanki_ftp');
            $ftp->connect("192.168.1.5");
            $ftp->login("user1", "user1");
            $id=$_POST["fichier"];
            $dest="C:/Users/Mimoo/Desktop/new".$id;
            $ftp->get($dest,$id, FTP_BINARY);
        } catch (FtpException $e) {
            echo 'Error: ', $e->getMessage();
        }
        return $this->redirectToRoute('ftp_homepage');
    }
}