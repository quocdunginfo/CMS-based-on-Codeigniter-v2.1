<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Image_resize {
 
   var $image;
   var $image_type;
 
   function load($filename) {
 
      try
      {
          if(file_exists($filename)==false)
          {
                return false;
          }
          $image_info = getimagesize($filename);
          $this->image_type = $image_info[2];
          if( $this->image_type == IMAGETYPE_JPEG ) {
     
             $this->image = imagecreatefromjpeg($filename);
          } elseif( $this->image_type == IMAGETYPE_GIF ) {
     
             $this->image = imagecreatefromgif($filename);
          } elseif( $this->image_type == IMAGETYPE_PNG ) {
     
             $this->image = imagecreatefrompng($filename);
          }
      }
      catch(Exception $ex)
        {
            return false;
        }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      try
      {
          if($this->image==null)
        {
            return false;
        }
          if( $image_type == IMAGETYPE_JPEG ) {
             imagejpeg($this->image,$filename,$compression);
          } elseif( $image_type == IMAGETYPE_GIF ) {
     
             imagegif($this->image,$filename);
          } elseif( $image_type == IMAGETYPE_PNG ) {
     
             imagepng($this->image,$filename);
          }
          if( $permissions != null) {
     
             chmod($filename,$permissions);
          }
      }
      catch(Exception $ex)
        {
            return false;
        }
   }
   function output($image_type=IMAGETYPE_JPEG) {
 
      try
      {
          if($this->image==null)
        {
            return false;
        }
        
          if( $image_type == IMAGETYPE_JPEG ) {
             imagejpeg($this->image);
          } elseif( $image_type == IMAGETYPE_GIF ) {
     
             imagegif($this->image);
          } elseif( $image_type == IMAGETYPE_PNG ) {
     
             imagepng($this->image);
          }
      }
      catch(Exception $ex)
        {
            return false;
        }
   }
   function getWidth() {
 
      try
      {
        if($this->image==null)
        {
            return 1;
        }
        
        return imagesx($this->image);
      }
      catch(Exception $ex)
        {
            return 1;
        }
   }
   function getHeight() {
 
      try
      {
        if($this->image==null)
        {
            return 1;
        }
        
        return imagesy($this->image);
      }catch(Exception $ex)
        {
            return 1;
        }
   }
   function resizeToHeight($height) {
 
      try
      {
          $ratio = $height / $this->getHeight();
          $width = $this->getWidth() * $ratio;
          $this->resize($width,$height);
      }
      catch(Exception $ex)
        {
            return false;
        }
   }
 
   function resizeToWidth($width) {
      try
      {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
      }
      catch(Exception $ex)
        {
            return false;
        }
   }
 
   function scale($scale) {
      try
      {
          $width = $this->getWidth() * $scale/100;
          $height = $this->getheight() * $scale/100;
          $this->resize($width,$height);
      }
      catch(Exception $ex)
        {
            return false;
        }
   }
 
   function resize($width,$height) {
      try
      {
          if($this->image==null)
            {
                return false;
            }
          
          $new_image = imagecreatetruecolor($width, $height);
          imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
          $this->image = $new_image;
      }
      catch(Exception $ex)
        {
            return false;
        }
   }
   function autofit($maxwidth,$maxheight) {
      try
      {
          if(($this->getWidth()+1)/($this->getHeight()+1)>=1)
          {
            $this->resizeToWidth($maxwidth);
          }
          else
          {
            $this->resizeToHeight($maxheight);
          }
      }
      catch(Exception $ex)
        {
            return false;
        }
   }   
    /*
    Cách dùng Class trên:
    - Ví d? du?i dây chúng ta s? resize ?nh picture.jpg thành kích thu?c 250x400 sau dó luu thành file picture2.jpg
    PHP Code:
    <?php
       include('SimpleImage.php');
       $image = new SimpleImage();
       $image->load('picture.jpg');
       $image->resize(250,400);
       $image->save('picture2.jpg');
    ?>
    
    N?u b?n mu?n resize theo chi?u r?ng và v?n gi? dc t? l? gi?a chi?u r?ng và chiêu cao thì tham kh?o ví d? du?i.
    Ví d? này s? resize chi?u r?ng file ?nh picture.jpg thành 250 và luu ra file picture2.jpg 
    PHP Code:
    <?php
       include('SimpleImage.php');
       $image = new SimpleImage();
       $image->load('picture.jpg');
       $image->resizeToWidth(250);
       $image->save('picture2.jpg');
    ?>
    Ngoài ra, b?n có th? resize theo t? l?. 
    Vd sau s? resize file ?nh gi?m xu?ng còn 1 n?a (50%)
    PHP Code:
    <?php
       include('SimpleImage.php');
       $image = new SimpleImage();
       $image->load('picture.jpg');
       $image->scale(50);
       $image->save('picture2.jpg');
    ?>
    B?n có th? resize t? 1 file sau dó xu?t ra nhi?u file khác nhau. ví d? sau s? resize file picture.jpg có nhi?u cao 500px luu thành file picture2.jpg và chi?u cao 200px luu thành file picture3.jpg
    
    PHP Code:
    <?php
       include('SimpleImage.php');
       $image = new SimpleImage();
       $image->load('picture.jpg');
       $image->resizeToHeight(500);
       $image->save('picture2.jpg');
       $image->resizeToHeight(200);
       $image->save('picture3.jpg');
    ?>
    
    Ví d? sau s? xu?t th?ng xu?ng trình duy?t và cho trình duy?t nh?n bi?t dây là ?nh qua header và không c?n luu thành file.
    PHP Code:
    <?php
       header('Content-Type: image/jpeg');
       include('SimpleImage.php');
       $image = new SimpleImage();
       $image->load('picture.jpg');
       $image->resizeToWidth(150);
       $image->output();
    ?>
    Du?i dây là 1 ví d? cho phép upload 1 ?nh thông qua form r?i resize ?nh thành có chi?u r?ng 250px r?i xu?t ra trình duy?t.(Luu ý kho?ng tr?ng tru?c <?php và sau ?>)
    PHP Code:
    <?php
       if( isset($_POST['submit']) ) {
          header('Content-Type: image/jpeg'); 
          include('SimpleImage.php');
          $image = new SimpleImage();
          $image->load($_FILES['uploaded_image']['tmp_name']);
          $image->resizeToWidth(150);
          $image->output();
          exit();
       } else {
     
    ?>
       <form action="upload.php" method="post" enctype="multipart/form-data">
          <input type="file" name="uploaded_image" />
          <input type="submit" name="submit" value="Upload" />
       </form>
    <?php
       }
    ?>
    
    
    */
}

?>