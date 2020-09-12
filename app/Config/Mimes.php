<?php namespace Config;

/*
| -------------------------------------------------------------------
| MIME TYPES
| -------------------------------------------------------------------
| This file contains an array of mime types.  It is used by the
| Upload class to help identify allowed file types.
|
| When more than one variation for an extension exist (like jpg, jpeg, etc)
| the most common one should be first in the array to aid the guess*
| methods. The same applies when more than one mime-type exists for a
| single extension.
|
*/
class Mimes
{
	/**
	 * Map of extensions to mime types.
	 *
	 * @var array
	 */
	public static $mimes = [
		'csv'	=>	array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel'),
		'xls'	=>	array('application/excel', 'application/vnd.ms-excel', 'application/msexcel'),
		'txt'	=>	'text/plain',
		'text'  => 'text/plain',
		'xlsx'	=>	array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip'),
						
	];

	//--------------------------------------------------------------------

	/**
	 * Attempts to determine the best mime type for the given file extension.
	 *
	 * @param string $extension
	 *
	 * @return string|null The mime type found, or none if unable to determine.
	 */
	public static function guessTypeFromExtension(string $extension)
	{
		$extension = trim(strtolower($extension), '. ');

		if (! array_key_exists($extension, static::$mimes))
		{
			return null;
		}

		return is_array(static::$mimes[$extension]) ? static::$mimes[$extension][0] : static::$mimes[$extension];
	}

	//--------------------------------------------------------------------

	/**
	 * Attempts to determine the best file extension for a given mime type.
	 *
	 * @param string $type
	 * @param string $proposed_extension - default extension (in case there is more than one with the same mime type)
	 *
	 * @return string|null The extension determined, or null if unable to match.
	 */
	public static function guessExtensionFromType(string $type, ?string $proposed_extension = null)
	{
		$type = trim(strtolower($type), '. ');

		$proposed_extension = trim(strtolower($proposed_extension));

		if (! is_null($proposed_extension) && array_key_exists($proposed_extension, static::$mimes) && in_array($type, is_string(static::$mimes[$proposed_extension]) ? [static::$mimes[$proposed_extension]] : static::$mimes[$proposed_extension]))
		{
			return $proposed_extension;
		}

		foreach (static::$mimes as $ext => $types)
		{
			if ((is_string($types) && $types === $type) || (is_array($types) && in_array($type, $types)))
			{
				return $ext;
			}
		}

		return null;
	}

	//--------------------------------------------------------------------

}
