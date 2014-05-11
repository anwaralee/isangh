<?php
class DashboardController extends AppController
{
    
    function beforeFilter() //is called before any other function is called
    {
        $this->layout='admin';
        if(!$this->Session->read('admin'))
        {
            $this->redirect('/admin');
        }
    }
    
    function index()
    {
        
    }
    
    function logout()
    {
        $this->Session->delete('admin');
        $this->redirect('/admin');
    }
    
    function pages()
    {
        $this->loadModel('Page');
        $q = $this->Page->find('all',array('conditions'=>array('parent'=>0)));
        $this->set('pages',$q);
    }
    function getChild($id)
    {
        $this->loadModel('Page');
        return $this->Page->find('all',array('conditions'=>array('parent'=>$id)));
    }
    
    function editPage($id)
    {
        $this->loadModel('Page');
        $q=$this->Page->find('first',array('conditions'=>array('id'=>$id)));
        $this->set('content',$q);
        if(isset($_POST['submit']))
        {
            foreach($_POST as $k=>$v)
            {
                $arr[$k] = $v;
            }
            $this->Page->id = $id;
           
            $this->Page->save($arr);
            $this->Session->setFlash('Page updated successfully');
            $this->redirect('/dashboard/pages');
        }
    }
    function addPage($id)
    {
        
        //$q=$this->Page->find('first',array('conditions'=>array('id'=>$id)));
        //$this->set('content',$q);
        if(isset($_POST['submit']))
        {
            foreach($_POST as $k=>$v)
            {
                $arr[$k] = $v;
            }
            $arr['parent'] = $id;
            $this->loadModel('Page');
            $this->Page->create();           
            $this->Page->save($arr);
            $this->Session->setFlash('Page added successfully');
            $this->redirect('/dashboard/pages');
        }
    }
    function deletePage($id)
    {
        $this->loadModel('Page');
        $this->Page->delete($id);
        $this->redirect('pages');
    }
    function settings()
    {
        $this->loadModel('Admin');
        $this->set('a',$this->Admin->find('first'));
        if(isset($_POST['username']))
        {
            foreach($_POST as $k=>$v)
            {
                $arr[$k] = $v;
            }
            $this->Admin->id = 1;
           
            $this->Admin->save($arr);
            $this->Session->setFlash('Updated successfully');
            $this->redirect('settings');
        }
    }
    
    function media()
    {
        $this->loadModel('Media');
        //$q = $this->Media->find('all', array('fields'=>'DISTINCT Media.media_type'));
//        $this->set('mtype',$q);
        $q = $this->Media->find('all');
        $this->set('content',$q);
    }
    
    function viewMedia($type)
    {
        $this->loadModel('Media');
        $q = $this->Media->find('all', array(
        'conditions'=>array('media_type = '=>$type),
        'order'=>'id DESC'));
        $this->set('content',$q);
    }
    function editMedia($id)
    {
        $this->loadModel('Media');
        if(isset($_POST) && $_POST)
        {
            $this->Media->id = $id;
            $type = $_POST['media_type'];
            
            if($type=="Print" || $type == "Publication")
            {
                $f = 1;
                $_POST['youtube'] = '';
            }
            else
            {
                if($_POST['av'] == 'a'){
                $f = 1;
                $_POST['youtube'] = '';
                }
                else{                
                $f=0;
                $_POST['file'] = '';
                }
                
            }
            
            if($f==1 && isset($_FILES['file']) && $_FILES['file'])
            {
                $name = $_FILES['file']['name'];
                $arr = explode('.',$name);
                $ext = end($arr);
                $rand = rand(100000,999999).'_'.rand(100000,999999);
                $_POST['file'] = $rand.'.'.$ext;
                $ext = strtolower($ext);
                if($ext == 'mp3' || $ext == 'wav' || $ext == 'doc' || $ext == 'pdf' || $ext == 'docx')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/doc/'.$_POST['file'];
                    if($_SERVER['SERVER_NAME'] == 'localhost')
                    {
                        $path = $_SERVER['DOCUMENT_ROOT'].'/isangh/app/webroot/doc/'.$_POST['file'];
        			}
                    move_uploaded_file($_FILES['file']['tmp_name'],$path);
                }
                else{
                $this->Session->setFlash('Invalid File Extension');    
                $this->redirect('editMedia/'.$id);
                }
                
            }
            $this->Media->save($_POST);
            $this->Session->setFlash('Media Successfully Edited!');
            $this->redirect('media');
        }
        $q = $this->Media->findById($id);
        $this->set('content',$q);
    }
    function addMedia()
    {
        $this->loadModel('Media');
        if(isset($_POST) && $_POST)
        {
            $this->Media->create();
            $type = $_POST['media_type'];
            
            if($type=="Print" || $type == "Publication")
            {
                $f = 1;
                $_POST['youtube'] = '';
            }
            else
            {
                if($_POST['av'] == 'a'){
                $f = 1;
                $_POST['youtube'] = '';
                }
                else{                
                $f=0;
                $_POST['file'] = '';
                }
                
            }
            
            if($f==1 && isset($_FILES['file']) && $_FILES['file'])
            {
                $name = $_FILES['file']['name'];
                $arr = explode('.',$name);
                $ext = end($arr);
                $rand = rand(100000,999999).'_'.rand(100000,999999);
                $_POST['file'] = $rand.'.'.$ext;
                $ext = strtolower($ext);
                if($ext == 'mp3' || $ext == 'wav' || $ext == 'doc' || $ext == 'pdf' || $ext == 'docx')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/doc/'.$_POST['file'];
                    if($_SERVER['SERVER_NAME'] == 'localhost')
                    {
                        $path = $_SERVER['DOCUMENT_ROOT'].'/isangh/app/webroot/doc/'.$_POST['file'];
        			}
                    move_uploaded_file($_FILES['file']['tmp_name'],$path);
                }
                else{
                $this->Session->setFlash('Invalid File Extension');    
                $this->redirect('editMedia/'.$id);
                }
                
            }
            $this->Media->save($_POST);
            $this->Session->setFlash('Media Successfully Added!');
            $this->redirect('media');
        }
        
    }
    function deleteMedia($id,$type)
    {
        $this->loadModel('Media');
        $this->Media->delete($id);
        $this->redirect(array('controller' => 'dashboard', 'action' => 'viewMedia', $type));
    }
}
?>