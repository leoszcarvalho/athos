<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Athos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

class ContatoController extends AbstractActionController
{
    public function indexAction()
    {
         
        $mail = new Mail\Message();
        $mail->setBody('Mensagem teste.');
        $mail->setFrom('atendimento@athospublicidade.com.br', 'Athos - Desenvolvimento e Publicidade');
        $mail->addTo('leonardo.souzas30@gmail.com', 'Leonardo');
        $mail->setSubject('Assunto');

        $transport = new SmtpTransport();
        $options   = new SmtpOptions(array(
            'name'              => 'athospublicidade.com.br',
            'host' => 'smtp.gmail.com',
            'port'              => 465, // Notice port change for TLS is 587
            'connection_class'  => 'login',
            'connection_config' => array(
            'ssl' => 'ssl',
            'username' => 'atendimento@athospublicidade.com.br',
            'password' => 'athos@2341',
            ),
        ));
        
        $transport->setOptions($options);
        $transport->send($mail);
        
	$this->layout('layout/layout_contato.phtml');

        return new ViewModel();
    }
}
