<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class CustomLengthAwarePaginator extends LengthAwarePaginator
{
    
    public function url($page)
    {
        $path = parse_url($this->path())['path'];
        $parameters = [];

        if ($page == 1) {
            return null;
        }
        
        // If we have any extra query string key / value pairs that need to be added
        // onto the URL, we will put them in query string form and then attach it
        // to the URL. This allows for extra information like sortings storage.
        // $parameters = ($page > 1) ? [$this->pageName => $page] : [];

        if ($page > 1) {
            $parameters['page'] = $page;
        }

        // Customize other URL parameters as needed
        $query = http_build_query($parameters, '', '&');

        return $path . ($query ? '?' . $query : '');
    }
    // Add any other custom logic as needed
}

?>