<?php

     /*
     
     input: text file,
     replace_list: text file → find_string|replace_string,
     output: text file.
     
     */
     
     $file_to_replace = file_get_contents('');
     $file_replace_list = ''; 
     $file_replaced = '';

     $fp = fopen($file_replace_list, "r");
     if ($fp) {
          while (($buffer = fgets($fp, 4096)) !== false) {
               $buffer = rtrim($buffer, "\r\n");
               $list = explode('|', $buffer);
               $find = $list[0];
               $replace = $list[1];
               $file_to_replace = str_replace($find, $replace, $file_to_replace);
          }
          fclose($fp);
          file_put_contents($file_replaced, $file_to_replace);
     }
     
?>