<?php

echo "
            <form id=\"search form\" class=\"form-inline\" action=\"search.php?searchx=advID\" method=\"post\">
                <input type=\"search\" id=\"crit\" name=\"crit\" class=\"form-control\" size=\"50\" placeholder=\"What are you waiting for?\">
                <select class=\"form-control\" name=\"select\" id=\"select\">
                    <option id=\"opt-Adventure\" value=\"advID\">Adventure (by Title)</option>
                    <option id =\"opt-AdvAuthor\" value=\"author\">Adventure (by Author)</option>
                    <option id =\"opt-Author\" value=\"firstName\">Author (by Name)</option>
                </select>
                <button type=\"submit\" class=\"btn btn-danger\">
                    <span class=\"glyphicon glyphicon-search\"></span>Search
                </button>
            </form>
";