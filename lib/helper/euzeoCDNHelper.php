<?php
/**
 * euzeoCDNHelper.
 *
 * @package    euzeoCDNPlugin
 * @subpackage helper
 * @author     Jerome Vandenende <jerome@euzeo.com>
 * @version    SVN: $Id$
 */

/**
 *
 * @param string $path
 * @return string
 */
function euzeo_cdn_url($path)
{
  return euzeoCDN::getUrl($path);
}

/**
 * 
 *
 * @param string $image_path
 * @param array $options
 * @return string image tag
 */
function euzeo_cdn_image_tag($image_path, $options = array())
{
  $url = euzeoCDN::getUrl($image_path);
  $baseOptions = array('src' => $url);
  $options = array_merge($options, $baseOptions);

  // from TagHelper
  return tag('img', $options, false);
}