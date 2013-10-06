<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Image_resize {
 
   var $image;
   var $image_type;
 
   function load($filename) {
 
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
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
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
   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
 
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
 
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }
   function autofit($maxwidth,$maxheight) {
      if(($this->getWidth()+1)/($this->getHeight()+1)>=1)
      {
        $this->resizeToWidth($maxwidth);
      }
      else
      {
        $this->resizeToHeight($maxheight);
      }
   }   
    /*
    C�ch d�ng Class tr�n:
    - V� d? du?i d�y ch�ng ta s? resize ?nh picture.jpg th�nh k�ch thu?c 250x400 sau d� luu th�nh file picture2.jpg
    PHP Code:
    <?php
       include('SimpleImage.php');
       $image = new SimpleImage();
       $image->load('picture.jpg');
       $image->resize(250,400);
       $image->save('picture2.jpg');
    ?>
    
    N?u b?n mu?n resize theo chi?u r?ng v� v?n gi? dc t? l? gi?a chi?u r?ng v� chi�u cao th� tham kh?o v� d? du?i.
    V� d? n�y s? resize chi?u r?ng file ?nh picture.jpg th�nh 250 v� luu ra file picture2.jpg 
    PHP Code:
    <?php
       include('SimpleImage.php');
       $image = new SimpleImage();
       $image->load('picture.jpg');
       $image->resizeToWidth(250);
       $image->save('picture2.jpg');
    ?>
    Ngo�i ra, b?n c� th? resize theo t? l?. 
    Vd sau s? resize file ?nh gi?m xu?ng c�n 1 n?a (50%)
    PHP Code:
    <?php
       include('SimpleImage.php');
       $image = new SimpleImage();
       $image->load('picture.jpg');
       $image->scale(50);
       $image->save('picture2.jpg');
    ?>
    B?n c� th? resize t? 1 file sau d� xu?t ra nhi?u file kh�c nhau. v� d? sau s? resize file picture.jpg c� nhi?u cao 500px luu th�nh file picture2.jpg v� chi?u cao 200px luu th�nh file picture3.jpg
    
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
    
    V� d? sau s? xu?t th?ng xu?ng tr�nh duy?t v� cho tr�nh duy?t nh?n bi?t d�y l� ?nh qua header v� kh�ng c?n luu th�nh file.
    PHP Code:
    <?php
       header('Content-Type: image/jpeg');
       include('SimpleImage.php');
       $image = new SimpleImage();
       $image->load('picture.jpg');
       $image->resizeToWidth(150);
       $image->output();
    ?>
    Du?i d�y l� 1 v� d? cho ph�p upload 1 ?nh th�ng qua form r?i resize ?nh th�nh c� chi?u r?ng 250px r?i xu?t ra tr�nh duy?t.(Luu � kho?ng tr?ng tru?c <?php v� sau ?>)
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