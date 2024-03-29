<?php 
$query = array();
/*--------------------- S E L E C T S -----------------------*/

$query["queryInvitadosByUserIdSeq"] = "select nombre, nombre_completo, email from invitados 
                                        where id_usuario = '#p1' and seq = '#p2';";
                                 
$query["queryAllInvitadosConfirm"] = "SELECT u.id, i.nombre_completo, i.celular, u.mesa, i.llego FROM invitados i, usuarios u where i.id_usuario = u.id and i.confirmado = 'SI' and u.confirmo = 'SI' order by u.id, i.nombre_completo";

$query["queryAllInvitadosNoAsisten"] = "SELECT u.id, i.nombre_completo, i.celular FROM invitados i, usuarios u where i.id_usuario = u.id and u.confirmo = 'SI' and (i.confirmado = 'NO' or i.confirmado is null) order by u.id, i.nombre_completo";

$query["queryLlegoInvitadosConfirm"] = "SELECT u.id, i.nombre_completo, i.celular, u.mesa, i.llego FROM invitados i, usuarios u where i.id_usuario = u.id and i.confirmado = 'SI' and u.confirmo = 'SI' and i.llego = 1 order by u.id, i.nombre_completo";

$query["queryNoLlegoInvitadosConfirm"] = "SELECT u.id, i.nombre_completo, i.celular, u.mesa, i.llego FROM invitados i, usuarios u where i.id_usuario = u.id and i.confirmado = 'SI' and u.confirmo = 'SI' and i.llego = -1 order by u.id, i.nombre_completo";

$query["queryUsuarioByUserId"] = "SELECT nombre, email, celular, nro_invitados, nro_confirmados, mesa FROM usuarios where id='#p1'";

$query["setLlegadaInvitado"] = "update invitados 
                                 set llego = (llego*-1) 
                                 where id_usuario = '#p1'
                                 and seq = '#p2'";
                                 
$query["resetInvConfirmado"] = "update invitados 
                                 set confirmado = 'NO' 
                                 where id_usuario = '#p1'";

$query["updateUsuarioConfirmado"] =  "update usuarios 
                                      set confirmo = '#p3', 
                                      nro_confirmados = #p2, 
                                      fecha_confirmo = NOW(),
                                      obs = '#p4'
                                      where id = '#p1'";

$query["queryInvitadosByUserId"] = "SELECT nombre, nombre_completo FROM invitados where id_usuario='#p1' order by seq";

$query["queryInvitadosConfirm"] = "SELECT seq, nombre, nombre_completo, llego FROM invitados where id_usuario='#p1' and confirmado = 'SI' order by seq";

$query["updateInvConfirmado"] = "update invitados 
                                 set confirmado = 'SI' 
                                 where id_usuario = '#p1' and seq = '#p2';";

$query["queryOpcInvitados"] =  "select o.seq_inv
                                from usuarios u, opciones o
                                where u.id = '#p1'
                                and o.nro_invitados = u.nro_invitados
                                order by o.seq";
											
/*
$query[""] = "";
*/

function getSql($nomConsulta,$p1="<NULL>", $p2="<NULL>", $p3="<NULL>", $p4="<NULL>", $p5="<NULL>", 
							 $p6="<NULL>", $p7="<NULL>", $p8="<NULL>", $p9="<NULL>", $p10="<NULL>",
							 $p11="<NULL>", $p12="<NULL>", $p13="<NULL>", $p14="<NULL>", $p15="<NULL>",
							 $p16="<NULL>", $p17="<NULL>", $p18="<NULL>", $p19="<NULL>", $p20="<NULL>")
{
	global $query;	
	$queryBase = "";
	$arr = array();
	
	$arr[1] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p1));
	$arr[2] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p2));
	$arr[3] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p3));
	$arr[4] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p4));
	$arr[5] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p5));
	$arr[6] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p6));
	$arr[7] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p7));
	$arr[8] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p8));
	$arr[9] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p9));
	$arr[10] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p10));
	$arr[11] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p11));
	$arr[12] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p12));
	$arr[13] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p13));
	$arr[14] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p14));
	$arr[15] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p15));
	$arr[16] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p16));
	$arr[17] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p17));
	$arr[18] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p18));
	$arr[19] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p19));
	$arr[20] = str_replace(chr(13), ' ', str_replace(chr(10), ' ',$p20));
	
	$queryBase = $query[$nomConsulta];	
		
	$result = replaceParams($queryBase, $arr);
	return $result;
}

function replaceParams($base, $params){
	$res = $base;
	for ($i=count($params);$i>=1;$i--){
		$pr = "#p".($i);
		$res = str_replace($pr,$params[$i],$res);
	}
	return $res;
}
?>