<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

function index()
{
    $this->loadModel('Media');
    $a = $this->Page->find('first',array('conditions'=>array('id'=>2)));
    $ac = $this->Page->find('all',array('conditions'=>array('parent'=>2)));
    $d = $this->Page->find('first',array('conditions'=>array('id'=>3)));
    $dc = $this->Page->find('all',array('conditions'=>array('parent'=>3)));
    $act = $this->Page->find('first',array('conditions'=>array('id'=>4)));
    $actc = $this->Page->find('all',array('conditions'=>array('parent'=>4)));
    $pr =  $this->Media->find('all',array('conditions'=>array('media_type'=>'Print')));
    $this->set('print',$pr);
    $pu =  $this->Media->find('all',array('conditions'=>array('media_type'=>'Publication')));
    $this->set('publication',$pu);
    $av =  $this->Media->find('all',array('conditions'=>array('media_type'=>'Audio-Visual')));
    $this->set('av',$av);
    $this->set('about',$a);
    $this->set('achild',$ac);
    $this->set('act',$act);
    $this->set('actc',$actc);
    $this->set('depart',$d);
    $this->set('child',$dc);
}

}
