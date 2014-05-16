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
    
    function media($type=null)
    {
        $this->loadModel('Media');
        //$q = $this->Media->find('all', array('fields'=>'DISTINCT Media.media_type'));
//        $this->set('mtype',$q);
        if($type)
        {
            $q = $this->Media->find('all',array(
        'conditions'=>array('media_type = '=>$type),'order'=>'id DESC'));
        }
        else
        {
        $q = $this->Media->find('all');
        }
        $this->set('type',$type);
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
                    
                        $path = APP.'webroot/doc/'.$_POST['file'];
        			
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
                      $path = APP.'webroot/doc/'.$_POST['file'];
        			
                    move_uploaded_file($_FILES['file']['tmp_name'],$path);
                }
                else{
                $this->Session->setFlash('Invalid File Extension');    
                $this->redirect('addMedia');
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
    
    
    function getMediaType()
    {
        $this->loadModel('Media');
        $q = $this->Media->find('all', array('fields'=>'DISTINCT Media.media_type'));
        return $q;
    }
    
    function addActImage()
    {
        $this->loadModel('Image');
        $q = $this->Image->find('all');
        $this->set('content',$q);
        if(isset($_POST) && $_POST)
        {
                $name = $_FILES['file']['name'];
                $arr = explode('.',$name);
                $ext = end($arr);
                $rand = rand(100000,999999).'_'.rand(100000,999999);
                $_POST['file'] = $rand.'.'.$ext;
                $ext = strtolower($ext);
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' || $ext == 'bmp')
                {
                    $path = APP.'webroot/doc/'.$_POST['file'];
                    move_uploaded_file($_FILES['file']['tmp_name'],$path);
                       
                }
                else{
                $this->Session->setFlash('Invalid File Extension');    
                $this->redirect('addActImage');
                }  
            $this->Image->create();
            $this->Image->save($_POST);
            $this->Session->setFlash('Image Successfully Added!');
            $this->redirect('/dashboard/pages');
        }
    }
    
    function deleteActImage($id)
    {
        $this->loadModel('Image');
        $this->Image->delete($id);
        $this->Session->setFlash('Image Successfully Deleted!');
        $this->redirect('/dashboard/addActImage');
    }
    
    function editActImage($id)
    {
        $this->loadModel('Image');
        //$q = $this->Image->find('all',array('conditions'=>array('id = '=>$id)));
         $q = $this->Image->findById($id);
        $this->set('content',$q);
        if(isset($_POST) && $_POST)
        {
            $old = $_POST['oldfile'];
            if(isset($_FILES['file']) && $_FILES['file']['name'])
            {
                $name = $_FILES['file']['name'];
                $arr = explode('.',$name);
                $ext = end($arr);
                $rand = rand(100000,999999).'_'.rand(100000,999999);
                $_POST['file'] = $rand.'.'.$ext;
                $ext = strtolower($ext);
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'png' || $ext == 'bmp')
                {
                    $oldpath = APP.'webroot/doc/'.$old;
                    unlink($oldpath);
                    $path = APP.'webroot/doc/'.$_POST['file'];
                    move_uploaded_file($_FILES['file']['tmp_name'],$path);
                    $this->Image->id = $id;
                    $this->Image->save($_POST);
                       
                }
                else
                {
                    $this->Session->setFlash('Invalid File Extension');    
                    $this->redirect('editActImage/'.$id);
                }
            }
            else
            {
            $this->Image->id = $id;
            $this->Image->save($_POST);
            }
            $this->Session->setFlash('Image Activities Successfully Edited!');
            $this->redirect('addActImage');
        }
        
        
    }
}
?>