<?php

/*
 * PEGO ESTE PHP PARA QUE TENGAMOS POR LAS DUDAS
 */

# Conexion Internaciones.
function conectint(){ 
  if (!($linkint=mysql_connect('localhost','root','123mario', TRUE))) 
  { 
    echo "Error conectando a la base de datos."; 
    exit(); 
  }
  if (!mysql_select_db('exportador_excel',$linkint)) 
  { 
    echo "Error seleccionando la base de datos."; 
    exit(); 
  } 
  mysql_set_charset('utf8');
  return $linkint;  
} 

function desconectarint(){
  global $linkint;
  mysqli_close($linkint);
}

##################################################################

# Conexion Admision.

function conectar_emergencias() 
{ 
  if (!($linkadm=mysql_connect('localhost','root','123mario', TRUE))) 
  { 
    echo "Error conectando a la base de datos."; 
    exit(); 
  }
  if (!mysql_select_db('emergencias',$linkadm)) 
  { 
    echo "Error seleccionando la base de datos."; 
    exit(); 
  } 
  mysql_set_charset('utf8');
  return $linkadm;  
} 

function desconectar_emergencias(){
  global $linkadm;
  mysqli_close($linkadm);
}

##################################################################

# Conexion Admision.

function conectadm() 
{ 
  if (!($linkadm=mysql_connect('localhost','root','123mario', TRUE))) 
  { 
    echo "Error conectando a la base de datos."; 
    exit(); 
  }
  if (!mysql_select_db('admision',$linkadm)) 
  { 
    echo "Error seleccionando la base de datos."; 
    exit(); 
  } 
  mysql_set_charset('utf8');
  return $linkadm;  
} 

function desconectaradm(){
  global $linkadm;
  mysqli_close($linkadm);
}

##################################################################

# Conexion Archivos Subidos.

function conectfiles() 
{ 
  if (!($linkfiles=mysql_connect('localhost','root','123mario', TRUE))) 
  { 
    echo "Error conectando a la base de datos."; 
    exit(); 
  }
  if (!mysql_select_db('subidas',$linkfiles)) 
  { 
    echo "Error seleccionando la base de datos."; 
    exit(); 
  } 
  return $linkfiles;  
} 

function desconectarfiles(){
  global $linkfiles;
  mysqli_close($linkfiles);
}

##################################################################

# Conexion XAM.

function conectxam() 
{ 
 //  if (!($linkxam=mysql_connect('192.168.0.47','rey.bruno','android'))) 
  if (!($linkxam=mysql_connect('localhost','root','123mario', TRUE))) 
  { 
    echo "Error conectando a la base de datos."; 
    exit(); 
  }
  if (!mysql_select_db('xam',$linkxam)) 
  { 
    echo "Error seleccionando la base de datos."; 
    exit(); 
  } 
  mysql_set_charset('utf8');
  return $linkxam;  
} 

function desconectxam(){
  global $conexion_xam;
  mysqli_close($conexion_xam);
}

function conectarse() 
{ 
 //  if (!($linkxam=mysql_connect('192.168.0.47','rey.bruno','android'))) 
  if (!($linkxam=mysql_connect('localhost','root','123mario', TRUE))) 
  { 
    echo "Error conectando a la base de datos."; 
    exit(); 
  }
  if (!mysql_select_db('xam',$linkxam)) 
  { 
    echo "Error seleccionando la base de datos."; 
    exit(); 
  } 
  mysql_set_charset('utf8');
  return $linkxam;  
} 

function desconectarse(){
  global $conexion_xam;
  mysqli_close($conexion_xam);
}

##################################################################

# Conexion BD Compartida.

function conectcomp() 
{ 
 if (!($linkcomp=mysql_connect('localhost','root','123mario', TRUE))) 
 { 
  echo "Error conectando a la base de datos."; 
  exit(); 
}
if (!mysql_select_db('comtodo',$linkcomp)) 
{ 
  echo "Error seleccionando la base de datos."; 
  exit(); 
} 
return $linkcomp;  
} 

function desconectcomp(){
  global $conexion_comp;
  mysqli_close($conexion_comp);
}

##################################################################

# Conexion BHDMQ.
function conectbdhmq(){ 
  //if (!($linkxam=mysql_connect('192.168.0.47','rey.bruno','android')))  
  if (!($linkbdhmq=mysql_connect('localhost','root','123mario', TRUE))) 
  { 
    echo "Error conectando a la base de datos."; 
    exit(); 
  }
  if (!mysql_select_db('bdhmq',$linkbdhmq)) 
  { 
    echo "Error seleccionando la base de datos."; 
    exit(); 
  } 
  mysql_set_charset('utf8');
  return $linkbdhmq;  
} 

function desconectbdhmq(){
  global $linkbdhmq;
  mysqli_close($linkbdhmq);
}
?>

