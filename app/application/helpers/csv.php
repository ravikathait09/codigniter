<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * CSV Helpers
 * Inspiration from PHP Cookbook by David Sklar and Adam Trachtenberg
 * 
 * @author		Jérôme Jaglale
 * @link		http://maestric.com/en/doc/php/codeigniter_csv
 */

// ------------------------------------------------------------------------

/**
 * Array to CSV
 *
 * download == "" -> return CSV string
 * download == "toto.csv" -> download file toto.csv
 */
 
 $CSV_HELPER_OBJECT = NULL;
 
if ( ! function_exists('csv_start'))
{
	function csv_start($download = "")
	{
		global $CSV_HELPER_OBJECT;
		if ($download != "")
		{	
			header('Content-Type: application/csv');
			header('Content-Disposition: attachement; filename="' . $download . '.csv"');
		}		

		ob_start();
		$CSV_HELPER_OBJECT = array( 
			'download' 	=> $download,
			'file' 		=> fopen('php://output', 'w')
		);
		
		if( ! $CSV_HELPER_OBJECT['file'])
		{
			show_error("Can't open php://output");
		}
	}
}

if ( ! function_exists('csv_write'))
{
	function csv_write($array)
	{
		global $CSV_HELPER_OBJECT;

		if ( ! fputcsv($CSV_HELPER_OBJECT['file'], $array))
			show_error("Can't write line: ".json_encode($array));
	}
}

if ( ! function_exists('csv_end'))
{
	function csv_end()
	{
		global $CSV_HELPER_OBJECT;
		fclose($CSV_HELPER_OBJECT['file']) or show_error("Can't close php://output");
		$str = ob_get_contents();
		ob_end_clean();

		if ($CSV_HELPER_OBJECT['download'] == "")
		{
			return $str;	
		}
		else
		{	
			echo $str;
		}		
	}
}

if ( ! function_exists('array_to_csv'))
{
	function array_to_csv($array, $download = "")
	{
		if ($download != "")
		{	
			header('Content-Type: application/csv');
			header('Content-Disposition: attachement; filename="' . $download . '.csv"');
		}		

		ob_start();
		$f = fopen('php://output', 'w') or show_error("Can't open php://output");
		$n = 0;		
		foreach ($array as $line)
		{
			$n++;
			if ( ! fputcsv($f, $line))
			{
				show_error("Can't write line $n: $line");
			}
		}
		fclose($f) or show_error("Can't close php://output");
		$str = ob_get_contents();
		ob_end_clean();

		if ($download == "")
		{
			return $str;	
		}
		else
		{	
			echo $str;
		}		
	}
}

// ------------------------------------------------------------------------

/**
 * Query to CSV
 *
 * download == "" -> return CSV string
 * download == "toto.csv" -> download file toto.csv
 */
if ( ! function_exists('query_to_csv'))
{
	function query_to_csv($query, $headers = TRUE, $download = "")
	{
		if ( ! is_object($query) OR ! method_exists($query, 'list_fields'))
		{
			show_error('invalid query');
		}
		
		$array = array();
		
		if ($headers)
		{
			$line = array();
			foreach ($query->list_fields() as $name)
			{
				$line[] = $name;
			}
			$array[] = $line;
		}
		
		foreach ($query->result_array() as $row)
		{
			$line = array();
			foreach ($row as $item)
			{
				$line[] = $item;
			}
			$array[] = $line;
		}

		echo array_to_csv($array, $download);
	}
}

/* End of file csv_helper.php */
/* Location: ./system/helpers/csv_helper.php */