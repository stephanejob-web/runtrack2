<?php

function bonjour($jour){
  if($jour){
      echo "bonjour";
  }else{
      echo "bonsoir";
  }
}

bonjour(false);