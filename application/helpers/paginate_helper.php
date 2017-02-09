<?php

if (!function_exists('paginate')) {
    /**
     * Custom Pagination helper for Codeigniter
     *
     * @param  string  $url                 [description]
     * @param  number  $total               [description]
     * @param  integer $limit               [description]
     * @param  integer $adjacents           [description]
     * @param  integer $page                [description]
     * @param  string  $model_id            [description]
     * @param  boolean $pesist_query_params [rebuld query param]
     * @return string                       Pagination links
     */
    function paginate($url, $total, $limit = 10, $adjacents = 3, $page = 1, $model_id = 'page', $pesist_query_params = true)
    {

        //if no page var is given, default to 1.
        $prev = $page - 1; //previous page is current page - 1
        $next = $page + 1; //next page is current page + 1
        $lastpage = ceil($total / $limit); //lastpage.
        $lpm1 = $lastpage - 1; //last page minus 1
        /* CREATE THE PAGINATION */
        $counter = 0;
        $pagination = "";
        $query_params = filter_input_array(INPUT_GET);

        unset($query_params[$model_id]); // remove current paginate value

        $query_params = $pesist_query_params ? (($query_params) ? http_build_query($query_params) : '') : '';

        if ($lastpage > 1) {
            $pagination .= "<ul class='pagination'>";
            if ($page > $counter + 1) {
                $pagination .= "<li><a href=\"$url?{$model_id}=$prev&$query_params\">prev</a></li>";
            }

            if ($lastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page) {
                        $pagination .= "<li  class='active'><a href='#'>$counter</a></li>";
                    } else {
                        $pagination .= "<li><a href=\"$url?{$model_id}=$counter&$query_params\">$counter</a></li>";
                    }
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
            {
                //close to beginning; only hide later pages
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page) {
                            $pagination .= "<li  class='active'><a href='#'>$counter</a></li>";
                        } else {
                            $pagination .= "<li><a href=\"$url?{$model_id}=$counter&$query_params\">$counter</a></li>";
                        }
                    }
                    $pagination .= "<li><a href='#'>...</a></li>";
                    $pagination .= "<li><a href=\"$url?{$model_id}=$lpm1\">$lpm1</a></li>";
                    $pagination .= "<li><a href=\"$url?{$model_id}=$lastpage&$query_params\">$lastpage</a></li>";
                }
                //in middle; hide some front and some back
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination .= "<li><a href=\"$url?{$model_id}=1&$query_params\">1</a></li>";
                    $pagination .= "<li><a href=\"$url?{$model_id}=2&$query_params\">2</a></li>";
                    $pagination .= "<li>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page) {
                            $pagination .= "<li  class='active'><a href='#'>$counter</a></li>";
                        } else {
                            $pagination .= "<li><a href=\"$url?{$model_id}=$counter&$query_params\">$counter</a></li>";
                        }
                    }
                    $pagination .= "<li><a href='#'>...</a></li>";
                    $pagination .= "<li><a href=\"$url?{$model_id}=$lpm1&$query_params\">$lpm1</a></li>";
                    $pagination .= "<li><a href=\"$url?{$model_id}=$lastpage&$query_params\">$lastpage</a></li>";
                }
                //close to end; only hide early pages
                else {
                    $pagination .= "<li><a href=\"$url?{$model_id}=1&$query_params\">1</a></li>";
                    $pagination .= "<li><a href=\"$url?{$model_id}=2&$query_params\">2</a></li>";
                    $pagination .= "<li><a href='#'>...</a></li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage;
                        $counter++) {
                        if ($counter == $page) {
                            $pagination .= "<li  class='active'><a href='#'>$counter</a></li>";
                        } else {
                            $pagination .= "<li><a href=\"$url?{$model_id}=$counter&$query_params\">$counter</a></li>";
                        }
                    }
                }
            }

            //next button
            if ($page < $counter - 1) {
                $pagination .= "<li><a href=\"$url?{$model_id}=$next&$query_params\">next</a></li>";
            } else {
                $pagination .= "";
            }

            $pagination .= "</ul>";
        }

        return $pagination;
    }
}
