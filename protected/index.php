<?php
   if (($_SERVER['HTTP_API_TOKEN'] != 'iamtoken')) {
      header('WWW-Authenticate: Basic Realm="Secret Stash"');
      header('HTTP/1.0 401 Unauthorized');
      print('You must provide the proper credentials!');
      exit;
   } else {
      echo 'from protected';
   }
   // echo $_SERVER['HTTP_API_TOKEN'];
   // if (($_SERVER['PHP_AUTH_USER'] != 'alexlu') || ($_SERVER['PHP_AUTH_PW'] != '12345')) {
   //    header('WWW-Authenticate: Basic Realm="Secret Stash"');
   //    header('HTTP/1.0 401 Unauthorized');
   //    print('You must provide the proper credentials!');
   //    exit;
   // } else {
   //    echo 'from protected';
   // }
   // echo 'from protected';
