<?php

/**
 * 
 *
 * @package euzeoCDNPlugin
 * @author Jerome Vandenende <jerome@euzeo.com>
 */
class euzeoCDN
{

  /**
   * 
   *
   * @param string $file_path
   * @return string 
   */
  static public function getUrl($file_path)
  {
    if (strlen(trim($file_path)) == 0) {
      return '';
    }

    $protocol = 'http://';
    if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_HTTPS']) && $_SERVER['HTTP_HTTPS'] == 'on'))
    {
      $protocol = 'https://';
    }

    $subdomains = sfConfig::get('app_euzeo_cdn_plugin_domains', array());

    if (count($subdomains) > 0)
    {
      // Get the md5 of the filename
      $md5 = md5($file_path);

      // Transform to decimal the last char of the md5
      $md5_decimal = hexdec($md5[strlen($md5) - 1]);

      // Number cannot be greater than the number of subdomains, so we modulo it
      $cdn_index = $md5_decimal % count($subdomains);

      // get the subdomain based on the hash
      $subdomain = $subdomains[$cdn_index];

      $url = $protocol . $subdomain . '/' . $file_path;
    }
    else
    {
      $url = '/' . $file_path;
    }

    return $url;
  }

}
