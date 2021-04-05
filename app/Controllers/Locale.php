<?php namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * Change site locale to requested one
 */
class Locale extends Controller
{
    // Set application wide locale
    public function set( string $locale )
    {
        // Check requested language exist in \Config\App
        if ( in_array($locale, config('App')->supportedLocales) )
        {
            // Save requested locale in session, will be set by filter
            session()->set('locale', $locale);

            // Reload page
            return redirect()->back();
        }
        else
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException( esc($locale) ." is not a supported language" );
        }
    }
}