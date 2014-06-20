<?php

kirbytext::$tags['minigallery'] = array(
  'attr' => array(
    'crop',
    'quality',
    'titles',
    'rel',
    'lightbox',
    'class',
    'img-class',
    'language'
  ),
  'html' => function($tag) {

    /**
     * Default values set them to your preferences.
    **/
    $defaults = array(
      'width'    => 200,
      'height'   => 200,
      'crop'     => false,
      'quality'  => 100,
      'rel'      => "gallery",  // if you want to create several different galleries on one page, you must specify a different relation
      'titles'   => "",         // image titles seperated with | 
      'lightbox' => "true",      // should there be a link to the original?
      'class'    => "",          //custom css class for this gallery
      'img-class' => "",        // custom css class for the image nodes
    );

    global $site;
    //$site = kirby::setup();

    // extract attirbutes
    $rel = $tag->attr('rel', $defaults['rel']);
    $class = $tag->attr('class', $defaults['class']);
    $files = $tag->attr('minigallery');
    $titles = $tag->attr('titles', $defaults['titles']);
    $lightbox = $tag->attr('lightbox', $defaults['lightbox']);

    // explode images and titles
    $filesArr = explode("|", $files);
    $titlesArr = explode("|", $titles);

    // html output 
    $output  = "<span class=\"minigallery";
    $output .= ($class) ? " ".$class : "";
    $output .= "\">";

    foreach ($filesArr as $key => $img) {
      $currentImage = $tag->file($img);

      if ($lightbox == "true") {
        $output .= "<a href=\"".$currentImage->url()."\" class=\"fancybox\" data-lightbox=\"".$rel."\""; 

        // is there a title?
        if (count($titlesArr) > 0 && isset($titlesArr[$key]) && $titlesArr[$key] != "") {
          $output .=" data-title= \"".$titlesArr[$key]."\" ";
        }

        $output .= ">";
      }


      // call thumb method
      $output .= thumb($currentImage, array( 
                                        'width'   => $tag->attr('width', $defaults['width']), 
                                        'height'  => $tag->attr('height', $defaults['height']),
                                        'crop'    => $tag->attr('crop', $defaults['crop']), 
                                        'quality' => $tag->attr('quality', $defaults['quality']),
                                        'class'   => $tag->attr('img-class', $defaults['img-class'])
                                     ));
      if ($lightbox == "true") {
        $output .= "</a>";
      }
    }

    $output .= "</span>";

    return $output;

  }
);