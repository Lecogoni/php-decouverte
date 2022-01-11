<?php


/**
 * 
 */
function getContentFolderFiles()
{
  $dir    = './content';
  $files = scandir($dir);
  unset($files[1]);
  unset($files[0]);
  return $files;
}

/**
 * @param [filename]
 * @return string nom de file sans extension .php
 */
function removePHPExtension($file){
  return substr($file, 0, -4);
}