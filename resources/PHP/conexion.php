<?php

header('Content-Type: text/html; charset=UTF-8');

function hola()
{
  return "hola";
}


function conexionBD()
{
  $pass = 'Admin123';

  // PHP Data Objects(PDO) Sample Code:
  // try {
  //   $conn = new PDO("sqlsrv:server = tcp:servadmin.database.windows.net,1433; Database = salon-belleza", "administrador", $pass);
  //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // } catch (PDOException $e) {
  //   print("Error connecting to SQL Server.");
  //   die(print_r($e));
  // }

  // SQL Server Extension Sample Code:

  $connectionInfo = array(
    "UID" => "administrador", 
    "pwd" => $pass, 
    "Database" => "salon-belleza", 
    'CharacterSet' => 'UTF-8',
    "LoginTimeout" => 30, 
    "Encrypt" => 1, 
    "TrustServerCertificate" => 0);

  $serverName = "tcp:servadmin.database.windows.net,1433";

  $conn = sqlsrv_connect($serverName, $connectionInfo);

  return $conn;
}

function ReadData($tableName)
{

  try {
    $conn = conexionBD();
    $sql = "SELECT * FROM $tableName";


    $stmt = sqlsrv_query($conn, $sql);
  } catch (Exception $e) {
    echo ("Error!");
  }
  $result = array();

  while ($row = sqlsrv_fetch_array($stmt)) {
    array_push($result, $row);
  }

  return $result;
}

function addImg($result)
{
  foreach ($result as $value) {
    echo ('
      <div class="break-inside-avoid ">
        <img src="' . $value["URL"] . '" class="rounded-xl"/>
      </div>
    ');
  }
}

function addProductos($result)
{

  foreach ($result as $value) {
    echo ('
      <a href="#" class="group">
        <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
          <img src="' . $value['URL'] . '" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
        <h3 class="mt-4 text-sm text-gray-700">' . $value['DESCRIPCION'] . '</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">$' . $value['PRECIO'] . '</p>
      </a>
    ');
  }
}

function addServicios($result)
{
  foreach ($result as $value) {

    echo ('
    <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 ">
    <img class="object-contain w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="' . $value['URL'] . '" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
        ' .  ($value['SERVICIO']) . '
      </h5>
      <p class="mb-3  text-gray-700 ">
        ' . $value['DESCRIPCION'] . '
      </p>
      <p class="mb-3  text-gray-700 ">' . $value['DURACION'] . ' min</p>
      <p class="mb-3  text-gray-700 ">$' . $value['PRECIO'] . '</p>
    </div>
  </a>
    ');
  }
}
