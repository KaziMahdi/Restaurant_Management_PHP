<?php
              $folder="views/layout/menus";
              foreach (glob("{$folder}/*_menu.php") as $filename)
              {
                  include $filename;
              }
          
          ?>